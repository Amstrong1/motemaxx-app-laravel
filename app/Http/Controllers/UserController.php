<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::where('admin', false)->get(),
            'my_actions' => $this->user_actions(),
            'my_attributes' => $this->user_columns()
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.user.show', [
            'user' => User::find($id),
            'my_fields' => $this->user_fields(),
        ]);
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

    private function user_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'email' => 'Email',
            'tel' => "Contact",
            'formatted_date' => "Date d'inscription",
        );
        return $columns;
    }

    private function user_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
        );
        return $actions;
    }

    private function user_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom',
                'field' => 'text'
            ],
            'email' => [
                'title' => 'Email',
                'field' => 'text'
            ],
            'tel' => [
                'title' => 'Contact',
                'field' => 'text'
            ],
        ];
        return $fields;
    }
}
