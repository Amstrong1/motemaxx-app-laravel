<?php

namespace App\Http\Controllers;

use App\Models\UserConsultation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreUserConsultationRequest;
use App\Http\Requests\UpdateUserConsultationRequest;

class UserConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserConsultationRequest $request)
    {
        // dd($request->except('_token'));

        for ($i=0; $i < count($request->except('_token')); $i++) {
            $userConsultation = new UserConsultation();
            $userConsultation->user_id = Auth::user()->id;
            $userConsultation->consultation_id = $request->input('consultation_id')[$i];
            $userConsultation->answer = $request->input('answer')[$i][0];
            if (isset($request->input('description')[$i])) {
                $userConsultation->description = $request->input('description')[$i];
            }
            $userConsultation->save();
        }

        if ($userConsultation->save()) {
            Alert::toast("Vos réposes ont été pris en compte", 'success');
            return redirect('consultation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserConsultation $userConsultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserConsultation $userConsultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserConsultationRequest $request, UserConsultation $userConsultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserConsultation $userConsultation)
    {
        //
    }
}
