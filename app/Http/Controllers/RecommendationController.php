<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreRecommendationRequest;
use App\Http\Requests\UpdateRecommendationRequest;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recommendations = Recommendation::all();

        if (Auth::user()->admin == false) {
            return view('recommandation.index', [
                'recommendations' => $recommendations,
            ]);
        } else {
            return view('admin.recommandation.index', [
                'recommendations' => $recommendations,
                'my_actions' => $this->recommendation_actions(),
                'my_attributes' => $this->recommendation_columns()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recommandation.create', [
            'my_fields' => $this->recommendation_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecommendationRequest $request)
    {
        $recommendation = new Recommendation();

        $recommendation->day = $request->day;
        $recommendation->breakfast = $request->breakfast;
        $recommendation->lunch = $request->lunch;
        $recommendation->dinner = $request->dinner;

        if ($recommendation->save()) {
            Alert::toast('Données enregistrées', 'success');
            return redirect('recommendation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Recommendation $recommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recommendation $recommendation)
    {
        return view('admin.recommandation.edit', [
            'recommendation' => $recommendation,
            'my_fields' => $this->recommendation_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecommendationRequest $request, Recommendation $recommendation)
    {
        $recommendation = Recommendation::find($recommendation->id);

        $recommendation->day = $request->day;
        $recommendation->breakfast = $request->breakfast;
        $recommendation->lunch = $request->lunch;
        $recommendation->dinner = $request->dinner;

        if ($recommendation->save()) {
            Alert::toast('Données enregistrées', 'success');
            return redirect('recommendation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recommendation $recommendation)
    {
        try {
            $recommendation = $recommendation->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('recommendation');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function recommendation_columns()
    {
        $columns = (object) array(
            'formatted_day' => 'Jour',
            'breakfast' => "Petit Déj",
            'lunch' => "Déjeuner",
            'dinner' => "Diner",
        );
        return $columns;
    }

    private function recommendation_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function recommendation_fields()
    {
        $days = [];
        for ($i=1; $i < 8; $i++) { 
            $days[] = 'Jour ' . $i;
        }
        $fields = [
            'day' => [
                'title' => 'Titre',
                'field' => 'select',
                'options' => $days
            ],
            'breakfast' => [
                'title' => 'Petit Déj',
                'field' => 'textarea'
            ],
            'lunch' => [
                'title' => 'Déjeuner',
                'field' => 'textarea'
            ],
            'dinner' => [
                'title' => 'Diner',
                'field' => 'textarea'
            ],
        ];
        return $fields;
    }
}
