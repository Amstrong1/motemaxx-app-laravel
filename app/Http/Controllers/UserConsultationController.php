<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserConsultation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\NouvelInscription;
use App\Http\Requests\StoreUserConsultationRequest;
use App\Http\Requests\UpdateUserConsultationRequest;

class UserConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userConsultations = UserConsultation::all();
        return view('admin.user-consultation.index', [
            'userConsultations' => $userConsultations,
            'my_actions' => $this->userConsultations_actions(),
            'my_attributes' => $this->userConsultations_columns()
        ]);
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
        $error = 0;
        for ($i = 0; $i < count($request->input('answer')); $i++) {
            if ($request->input('answer')[$i][0] == null) {
                $error++;
            }
        }

        if ($error == 0) {
            for ($i = 0; $i < count($request->input('consultation_id')); $i++) {
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
                $admins = User::where('admin', true)->get();
                foreach ($admins as $admin) {
                    $admin->notify(new NouvelInscription());
                }
                Alert::toast("Vos réponses ont été pris en compte", 'success');
                return redirect('appiphone');
            } else {
                Alert::toast('Une erreur est survenue', 'error');
                return redirect()->back()->withInput($request->input());
            }
        } else {
            Alert::toast('Veuillez remplir tous les champs', 'error');
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

    private function userConsultations_columns()
    {
        $columns = (object) array(
            'user_name' => 'Client',
            'consultation_name' => 'Consultation',
            'answer' => 'Reponse',
            'description' => 'Description',
            'formatted_date' => 'Date',
        );
        return $columns;
    }

    private function userConsultations_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
        );
        return $actions;
    }
}
