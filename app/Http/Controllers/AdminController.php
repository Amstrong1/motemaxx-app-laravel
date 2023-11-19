<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Motivation;
use App\Models\Prestation;
use App\Models\Reservation;
use App\Models\Consultation;
use App\Models\Advertisement;
use App\Models\Recommendation;
use App\Models\UserConsultation;

class AdminController extends Controller
{
    public function __invoke()
    {
        $users = User::count();
        $services = Prestation::count();
        $motivations = Motivation::count();
        $reservations = Reservation::count();
        $consultations = Consultation::count();
        $advertisements = Advertisement::count();
        $recommendations = Recommendation::count();
        $userConsultations = UserConsultation::count();

        return view('admin.index', compact(
            'users',
            'services',
            'motivations',
            'reservations',
            'consultations',
            'advertisements',
            'recommendations',
            'userConsultations',
        ));
    }
}
