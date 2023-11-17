<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use App\Models\ImagePrestation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePrestationRequest;
use App\Http\Requests\UpdatePrestationRequest;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestations = Prestation::all();
        if (Auth::user() == null ||  Auth::user()->admin == false) {
            return view('prestation.index', [
                'prestations' => $prestations,
            ]);
        } else {
            return view('admin.prestation.index', [
                'prestations' => $prestations,
                'my_actions' => $this->prestation_actions(),
                'my_attributes' => $this->prestation_columns()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prestation.create', [
            'my_fields' => $this->prestation_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrestationRequest $request)
    {
        $prestation = new Prestation();

        $fileName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('storage'), $fileName);

        $prestation->name = $request->name;
        $prestation->logo = $fileName;
        $prestation->description = $request->description;
        $prestation->save();

        if ($prestation->save()) {
            $i = 0;
            foreach ($request->file('images') as $image) {

                $fileName = time() . '.' . $image->extension() . '.' . $i++;
                $image->move(public_path('storage'), $fileName);

                ImagePrestation::create([
                    'prestation_id' => $prestation->id,
                    'image' => $fileName,
                ]);
            }
        }

        return redirect()->route('prestation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestation $prestation)
    {
        session(['prestation_id' => $prestation->id]);
        $images = ImagePrestation::where('prestation_id', $prestation->id)->get();

        if (Auth::user() == null ||  Auth::user()->admin == false) {
            return view('prestation.show', compact('prestation', 'images'));
        } else {
            return view('admin.prestation.show', [
                'images' => $images,
                'prestation' => $prestation,
                'my_fields' => $this->prestation_fields(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestation $prestation)
    {
        return view('admin.prestation.edit', [
            'prestation' => $prestation,
            'my_fields' => $this->prestation_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrestationRequest $request, Prestation $prestation)
    {
        $prestation = Prestation::find($prestation->id);



        $prestation->name = $request->name;
        $prestation->description = $request->description;

        if ($request->logo !== null) {
            $fileName = time() . '.' . $request->logo->extension();
            $prestation->logo = $fileName;
            $request->logo->move(public_path('storage'), $fileName);
        }

        $prestation->save();

        if ($prestation->save()) {
            $i = 0;
            if ($request->file('images') !== null) {
                foreach ($request->file('images') as $image) {
                    $file = time() . '.' . $image->extension() . '.' . $i++;
                    $image->move(public_path('storage'), $file);
    
                    ImagePrestation::create([
                        'prestation_id' => $prestation->id,
                        'image' => $fileName,
                    ]);
                }
            }
        }

        if ($prestation->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('prestation');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestation $prestation)
    {
        $images = ImagePrestation::where('prestation_id', $prestation->id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
        try {
            $prestation = $prestation->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('prestation');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function prestation_columns()
    {
        $columns = (object) array(
            'logo' => '',
            'name' => 'Nom',
            // 'description' => "Description",
        );
        return $columns;
    }

    private function prestation_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function prestation_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom',
                'field' => 'text'
            ],
            'description' => [
                'title' => 'Description',
                'field' => 'textarea'
            ],
            'logo' => [
                'title' => 'Logo',
                'field' => 'file'
            ],
            'images' => [
                'title' => 'Images',
                'field' => 'multiple-file'
            ],
        ];
        return $fields;
    }
}
