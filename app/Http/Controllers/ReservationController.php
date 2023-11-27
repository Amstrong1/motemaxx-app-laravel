<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\HourReservation;
use App\Models\ReservationService;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\ReservationConfirme;
use App\Notifications\ReservationNonConfirme;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->admin == false) {

            foreach (Auth::user()->unreadNotifications as $notification) {
                if ($notification->data['link'] == "reservation.index") {
                    $notification->markAsRead();
                }
            }

            $reservations = Reservation::where('user_id', Auth::user()->id)->with('reservationServices')->orderBy('date', 'desc')->get();
            session(['prestation_id' => null]);
            return view('reservation.index', compact('reservations'));
        } else {

            $admins = User::where('admin', true)->get();
            foreach ($admins as $admin) {
                foreach ($admin->unreadNotifications as $notification) {
                    if ($notification->data['link'] == "reservation.index") {
                        $notification->markAsRead();
                    }
                }
            }

            return view('admin.reservation.index', [
                'reservations' => Reservation::where('date', '>=', date('Y-m-d'))->orderBy('date', 'desc')->get(),
                'my_actions' => $this->reservation_actions(),
                'my_attributes' => $this->reservation_columns()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prestations = Prestation::where('show', true)->get();
        return view('reservation.create', compact('prestations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        if ($request->input('prestation_id') == null && $request->input('prestations') == null) {
            Alert::toast("Aucun service sélectionné", 'error');
            return redirect()->back()->withInput($request->input());
        } else {
            if ($request->input('hours')[0] !== null) {
                $checkDates = Reservation::where('date', date("Y-m-d", strtotime($request->input('date'))))->where('paid', true)->get();
                foreach ($checkDates as $checkDate) {
                    foreach ($checkDate->hourReservations()->get() as $checkTime) {
                        for ($i = 1; $i < count($request->input('hours')); $i++) {
                            if ($checkTime->hour == $request->input('hours')[$i]) {
                                Alert::toast("Réservation non disponible pour " . $request->input('hours')[$i], 'error');
                                return redirect()->back()->withInput($request->input());
                            }
                        }
                    }
                }
            } else {
                Alert::toast("Aucune heure sélectionnée", 'error');
                return redirect()->back()->withInput($request->input());
            }
        }

        if (count($request->input('prestations')) > 2) {
            if (count($request->input('hours')) < 3) {
                Alert::toast("La durée minimum pour plusieurs prestations est de 2h", 'error');
                return redirect()->back()->withInput($request->input());
            }
        }

        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->date = date("Y-m-d", strtotime(str_replace('/', '-', $request->input('date'))));
        $reservation->save();

        for ($i = 1; $i < count($request->input('hours')); $i++) {
            $hourReservation = new HourReservation();
            $hourReservation->reservation_id = $reservation->id;
            $hourReservation->hour = $request->input('hours')[$i];
            $hourReservation->save();
        }

        if ($request->input('prestation_id') !== null) {
            $reservationService = new ReservationService();
            $reservationService->reservation_id = $reservation->id;
            $reservationService->prestation_id = $request->input('prestation_id');
            $reservationService->save();
        }

        if ($request->input('prestations') !== null) {
            for ($i = 1; $i < count($request->input('prestations')); $i++) {
                $reservationService = new ReservationService();
                $reservationService->reservation_id = $reservation->id;
                $reservationService->prestation_id = $request->input('prestations')[$i];
                $reservationService->save();
            }
        }

        if ($reservation->save()) {
            Alert::toast("Réservation éffectué", 'success');
            return redirect()->route('reservation.paid', $reservation->id);
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    public function paid(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        return view('reservation.paid', compact('reservation'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('admin.reservation.edit', [
            'reservation' => $reservation,
            'my_fields' => $this->reservation_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->status = $request->status;

        if ($reservation->save()) {
            if ($reservation->status == 'Acceptée') {
                $reservation->user->notify(new ReservationConfirme());
            } else {
                $reservation->user->notify(new ReservationNonConfirme());
            }

            Alert::toast('Reservation modifié', 'success');
            return redirect('reservation');
        } else {
            Alert::toast('Reservation modifié', 'success');
            return back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        if ($reservation->paid == false) {
            $reservationService = ReservationService::where('reservation_id', $reservation->id)->get();
            foreach ($reservationService as $service) {
                $service->delete();
            }
            $reservationHour = HourReservation::where('reservation_id', $reservation->id)->get();
            foreach ($reservationHour as $hour) {
                $hour->delete();
            }
            try {
                $reservation = $reservation->delete();
                Alert::success('Opération effectuée', 'Suppression éffectué');
                return redirect('reservation');
            } catch (\Exception $e) {
                Alert::error('Erreur', 'Element introuvable');
                return redirect()->back();
            }
        } else {
            $reservation->status = 'Annulée';

            if ($reservation->save()) {
                Alert::toast('Reservation annulée', 'error');
                return redirect()->back();
            }
        }
    }

    private function reservation_columns()
    {
        $columns = (object) array(
            'user_name' => 'Client',
            'prestation_name' => 'Service',
            'formatted_date' => 'Date',
            'hour' => "Heure",
            'status' => "Statut",
            'is_paid' => "Payé",
        );
        return $columns;
    }

    private function reservation_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
        );
        return $actions;
    }

    private function reservation_fields()
    {
        $fields = [
            'status' => [
                'title' => 'Statut',
                'field' => 'select',
                'options' => [
                    'Acceptée' => 'Accepter',
                    'Rejetée' => 'Rejeter',
                ]
            ],
        ];
        return $fields;
    }
}
