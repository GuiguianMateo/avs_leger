<?php

namespace App\Http\Controllers;

use App\Models\praticien;
use App\Models\Type;
use Illuminate\Http\Request;

class PraticienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $praticiens = Praticien::withTrashed()->get();
        $types = Type::withTrashed()->get();

        return view('praticien.index', compact('praticiens','types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('praticien.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $praticien = new Praticien();

        $praticien->nom = $data['nom'];
        $praticien->job = $data['job'];
        $praticien->type_id = $data['type_id'];

        $praticien->save();

        session()->flash('message', ['type' => 'success', 'text' => __('praticien crée avec succès.')]);

        return redirect()->route('praticien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(praticien $praticien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(praticien $praticien)
    {
        $types = Type::all();

        return view('praticien.edit',compact('types', 'praticien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, praticien $praticien)
    {
        $data = $request->all();
        $praticien = Praticien::findOrFail($praticien->id);

        $praticien->nom = $data['nom'];
        $praticien->job = $data['job'];
        $praticien->type_id = $data['type_id'];

        $praticien->save();

        session()->flash('message', ['type' => 'success', 'text' => __('praticien modifié avec succès.')]);

        return redirect()->route('praticien.index');
    }

 /**
     * Remove the specified resource from storage.
     */
    public function destroy(praticien $praticien)
    {
        $praticien->delete();
        session()->flash('message', ['type' => 'success', 'text' => __('praticien supprimé avec succès.')]);
        return redirect()->route('praticien.index');
    }


    public function restore($id)
    {
        $praticien = Praticien::withTrashed()->findOrFail($id);
        $praticien->restore();
        session()->flash('message', ['type' => 'success', 'text' => __('praticien restauré avec succès.')]);
        return redirect()->route('praticien.index');
    }
}
