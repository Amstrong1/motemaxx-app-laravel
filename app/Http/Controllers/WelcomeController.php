<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestation;
use Illuminate\Http\Request;
use App\Notifications\UserMail;
use RealRashid\SweetAlert\Facades\Alert;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $prestations = Prestation::all();
        return view('welcome', compact('prestations'));
    }


    public function mail(Request $request)
    {
        $admins = User::where('admin', true)->get();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'object' => $request->object,
            'message' => $request->message
        ];
        foreach ($admins as $admin) {
            $admin->notify(new UserMail($data));
        }

        Alert::toast('Message envoyé', 'success');
        return redirect()->route('welcome');
    }
}
