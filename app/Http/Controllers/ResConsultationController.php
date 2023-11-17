<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ResConsultation;
use RealRashid\SweetAlert\Facades\Alert;

class ResConsultationController extends Controller
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
        return view('admin.res-consultation.create', [
            'my_fields' => $this->resConsultation_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resConsultations = ResConsultation::where('consultation_id', session('consultation_id'))->get();

        foreach ($resConsultations as $resConsultation) {
            $resConsultation = $resConsultation->delete();
        }

        $error = 0;
        for ($i = 0; $i < count($request->input('answer')); $i++) {
            $resConsultation = new ResConsultation();
            $resConsultation->consultation_id = session('consultation_id');
            $resConsultation->answer = $request->input('answer')[$i];
            $resConsultation->save();

            if ($resConsultation->save()) {
            } else {
                Alert::toast('Une erreur est survenue à la réponse' . $i, 'error');
                $error++;
            }
        }

        if ($error == 0) {
            Alert::toast('Données enregistrées', 'success');
            return redirect('consultation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function resConsultation_fields()
    {
        $fields = [];
        for ($i = 0; $i < session('answer'); $i++) {
            $fields[$i] = [
                'answer[' . $i . ']' => [
                    'title' => 'Réponse ' . $i + 1,
                    'field' => 'text'
                ],
            ];
        }
        $fields = Arr::collapse($fields);
        return $fields;
    }
}
