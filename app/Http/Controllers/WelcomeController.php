<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $prestations = Prestation::all();
        return view('welcome', compact('prestations'));
    }
}
