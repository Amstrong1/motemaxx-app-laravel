<?php

namespace App\Http\Controllers;

use App\Models\Motivation;
use App\Models\Prestation;
use App\Models\Reservation;
use App\Models\Consultation;
use App\Models\Recommendation;
use App\Models\UserConsultation;

class AdminController extends Controller
{
    public function __invoke()
    {
        $services = Prestation::count();
        $motivations = Motivation::count();
        $reservations = Reservation::count();
        $consultations = Consultation::count();
        $recommendations = Recommendation::count();
        $userConsultations = UserConsultation::count();

        return view('admin.index', compact(
            'services',
            'motivations',
            'reservations',
            'consultations',
            'recommendations',
            'userConsultations',
        ));
    }
}
