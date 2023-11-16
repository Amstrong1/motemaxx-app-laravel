<?php

namespace App\Http\Controllers;

use App\Models\Motivation;
use App\Models\Prestation;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke()
    {
        $services = Prestation::count();
        $motivations = Motivation::count();
        $reservations = Reservation::count();

        return view('admin.index', compact('services', 'motivations', 'reservations'));
    }
}
