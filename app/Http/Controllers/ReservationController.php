<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Notifications\NewReservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::user()->id)->get();
        if (Auth::user()->admin == false) {
            return view('reservation.index', compact('reservations'));
        } else {
            return view('admin.reservation.index', [
                'reservations' => $reservations,
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
        $prestations = Prestation::all();
        return view('reservation.create', compact('prestations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->date = date("Y-m-d", strtotime($request->input('date')));
        $reservation->time_start = $request->input('time_start');
        $reservation->time_end = $request->input('time_end');
        $reservation->prestation_id = $request->input('prestation_id');
        $reservation->save();

        $admins = User::where('admin', true)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewReservation());
        }

        if ($reservation->save()) {
            Alert::toast("Réservation éffectué", 'success');
            return redirect('reservation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
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
            'time_start' => 'Heure Debut',
            'time_end' => "Heure Fin",
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
