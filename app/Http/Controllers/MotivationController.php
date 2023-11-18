<?php

namespace App\Http\Controllers;

use App\Models\Motivation;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreMotivationRequest;
use App\Http\Requests\UpdateMotivationRequest;

class MotivationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motivations = Motivation::all();
        return view('admin.motivation.index', [
            'motivations' => $motivations,
            'my_actions' => $this->motivation_actions(),
            'my_attributes' => $this->motivation_columns()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.motivation.create', [
            'my_fields' => $this->motivation_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMotivationRequest $request)
    {
        $motivation = new Motivation();

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage'), $fileName);

        $motivation->text = $request->text;
        $motivation->publication_date = $request->publication_date;
        $motivation->image = $fileName;
        $motivation->status = 'Non Envoyer';        

        if ($motivation->save()) {
            Alert::toast('Données enregistrées', 'success');
            return redirect('motivation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Motivation $motivation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motivation $motivation)
    {
        return view('admin.motivation.edit', [
            'motivation' => $motivation,
            'my_fields' => $this->motivation_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotivationRequest $request, Motivation $motivation)
    {
        $motivation = Motivation::find($motivation->id);

        if ($request->file !== null) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $fileName);
        }

        $motivation->text = $request->text;
        $motivation->publication_date = $request->publication_date;

        if (isset($fileName)) {
            $motivation->image = $fileName;
        }

        if ($motivation->save()) {
            Alert::toast('Données enregistrées', 'success');
            return redirect('motivation');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motivation $motivation)
    {
        try {
            $motivation = $motivation->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('motivation');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function motivation_columns()
    {
        $columns = (object) array(
            'image' => '',
            'text' => 'Texte',
            'formatted_date' => "Date de publication",
        );
        return $columns;
    }

    private function motivation_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function motivation_fields()
    {
        $fields = [
            'text' => [
                'title' => 'Texte',
                'field' => 'text'
            ],
            'publication_date' => [
                'title' => 'Date de publication',
                'field' => 'date'
            ],
            'image' => [
                'title' => 'Images',
                'field' => 'file'
            ],
        ];
        return $fields;
    }
}
