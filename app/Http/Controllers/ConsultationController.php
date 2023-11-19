<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\Consultation;
use App\Models\ResConsultation;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::all();
        if (Auth::user()->admin == false) {
            return view('consultation.index', [
                'consultations' => $consultations,
            ]);
        } else {
            return view('admin.consultation.index', [
                'consultations' => $consultations,
                'my_actions' => $this->consultation_actions(),
                'my_attributes' => $this->consultation_columns()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consultation.create', [
            'my_fields' => $this->consultation_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultationRequest $request)
    {
        $consultation = new Consultation();

        $consultation->name = $request->name;
        $consultation->description = $request->description;
        $consultation->answer = $request->answer;

        if ($consultation->save()) {
            Alert::toast('Données enregistrées', 'success');
            if ($consultation->answer > 0) {
                session(['answer' => $consultation->answer]);
                session(['consultation_id' => $consultation->id]);
                return redirect()->route('res_consultation.create');
            } else {
                return redirect('consultation');
            }
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        $resConsultations = ResConsultation::where('consultation_id', $consultation->id)->get();
        session(['answerCount' => $consultation->answer]);
        return view('admin.consultation.show', [
            'consultation' => $consultation,
            'resConsultations' => $resConsultations,
            'my_fields' => $this->consultation_fields(),
            'my_resFields' => $this->resConsultation_fields(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        $resConsultations = ResConsultation::where('consultation_id', $consultation->id)->get();
        session(['answerCount' => $consultation->answer]);
        return view('admin.consultation.edit', [
            'consultation' => $consultation,
            'resConsultations' => $resConsultations,
            'my_fields' => $this->consultation_fields(),
            'my_resFields' => $this->resConsultation_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {
        $consultation = Consultation::find($consultation->id);

        $consultation->name = $request->name;
        $consultation->description = $request->description;
        $consultation->answer = $request->answer;

        if ($consultation->save()) {
            Alert::success('Données enregistrées', 'success');
            return redirect('consultation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        $resConsultations = ResConsultation::where('consultation_id', $consultation->id)->get();
        foreach ($resConsultations as $resConsultation) {
            $resConsultation = $resConsultation->delete();
        }
        try {
            $consultation = $consultation->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('consultation');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function consultation_columns()
    {
        $columns = (object) array(
            'name' => 'Texte',
            // 'formatted_date' => "Date de publication",
        );
        return $columns;
    }

    private function consultation_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function consultation_fields()
    {
        $description = [0 => 'Non', 1 => 'Oui'];
        $fields = [
            'name' => [
                'title' => 'Question',
                'field' => 'textarea'
            ],
            'description' => [
                'title' => 'Description',
                'field' => 'select',
                'options' => $description
            ],
            'answer' => [
                'title' => 'Nombre de réponses',
                'field' => 'number'
            ],
        ];
        return $fields;
    }

    private function resConsultation_fields()
    {
        $fields = [];
        for ($i = 0; $i < session('answerCount'); $i++) {
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
