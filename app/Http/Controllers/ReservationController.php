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
            $reservations = Reservation::where('user_id', Auth::user()->id)->get();
            session(['prestation_id' => null]);
            return view('reservation.index', compact('reservations'));
        } else {
            return view('admin.reservation.index', [
                'reservations' => Reservation::orderBy('date', 'desc')->get(),
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
        $checkDates = Reservation::where('date', date("Y-m-d", strtotime($request->input('date'))))->get();
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

        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->date = date("Y-m-d", strtotime($request->input('date')));
        $reservation->save();

        for ($i = 1; $i < count($request->input('hours')); $i++) {
            $hourReservation = new HourReservation();
            $hourReservation->reservation_id = $reservation->id;
            $hourReservation->hour = $request->input('hours')[$i];
            $hourReservation->save();
        }

        $reservationService = new ReservationService();
        $reservationService->reservation_id = $reservation->id;
        $reservationService->prestation_id = $request->input('prestation_id');
        $reservationService->save();

        if ($request->input('prestations') == null) {
            for ($i = 1; $i < count($request->input('prestations')); $i++) {
                $reservationService = new ReservationService();
                $reservationService->reservation_id = $reservation->id;
                $reservationService->prestation_id = $request->input('prestations')[$i];
                $reservationService->save();
            }
        }

        $admins = User::where('admin', true)->get();
        // foreach ($admins as $admin) {
        //     $admin->notify(new NewReservation());
        // }

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
        if ($request->method() == 'POST') {
            $reservation = Reservation::find($id);
            $reservation->paid = true;

            if ($reservation->save()) {
                Alert::toast("Réservation payé", 'success');
                return redirect()->route('reservation.index');
            } else {
                Alert::toast('Une erreur est survenue', 'error');
                return redirect()->back()->withInput($request->input());
            }
        } else {
            return view('reservation.paid', compact('id'));
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        try {
            $reservation = $reservation->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('task');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
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
}
