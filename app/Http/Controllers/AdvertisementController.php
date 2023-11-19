<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('admin.advertisement.index', [
            'advertisements' => $advertisements,
            'my_actions' => $this->advertisement_actions(),
            'my_attributes' => $this->advertisement_columns()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertisement.create', [
            'my_fields' => $this->advertisement_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertisementRequest $request)
    {
        $advertisement = new Advertisement();

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage'), $fileName);

        $advertisement->title = $request->title;
        $advertisement->link = $request->link;
        $advertisement->show = $request->show;
        $advertisement->image = $fileName;

        if ($advertisement->save()) {
            Alert::toast('Données enregistrées', 'success');
            return redirect('advertisement');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisement.edit', [
            'advertisement' => $advertisement,
            'my_fields' => $this->advertisement_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        $advertisement = Advertisement::find($advertisement->id);

        if ($request->file !== null) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $fileName);
        }

        $advertisement->title = $request->title;
        $advertisement->link = $request->link;
        $advertisement->show = $request->show;
        $advertisement->image = $fileName;

        if (isset($fileName)) {
            $advertisement->image = $fileName;
        }

        if ($advertisement->save()) {
            Alert::toast('Données enregistrées', 'success');
            return redirect('advertisement');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        try {
            $advertisement = $advertisement->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('advertisement');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function advertisement_columns()
    {
        $columns = (object) array(
            'image' => 'Image',
            'title' => 'Titre',
            'link' => 'Lien',
            'status' => 'Statut',
            'formatted_date' => "Date de publication",
        );
        return $columns;
    }

    private function advertisement_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function advertisement_fields()
    {
        $fields = [
            'title' => [
                'title' => 'Titre',
                'field' => 'url'
            ],
            'link' => [
                'title' => 'Lien (optionel)',
                'field' => 'url'
            ],
            'show' => [
                'title' => 'Statut',
                'field' => 'select',
                'options' => [
                    '1' => 'Afficher',
                    '0' => 'Cacher'
                ]
            ],
            'image' => [
                'title' => 'Images',
                'field' => 'file'
            ],
        ];
        return $fields;
    }
}
