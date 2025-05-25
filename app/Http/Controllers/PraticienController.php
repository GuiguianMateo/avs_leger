<?php

namespace App\Http\Controllers;

use App\Models\Praticien;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PraticienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isA('admin')) {

            $praticiens = Praticien::withTrashed()->get();
            $types = Type::withTrashed()->get();

            return view('praticien.index', compact('praticiens', 'types'));
        } else {
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->isA('admin')) {

            $types = Type::all();

            return view('praticien.create', compact('types'));
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isA('admin')) {

            $data = $request->all();
            $praticien = new Praticien();

            $praticien->nom = $data['nom'];
            $praticien->job = $data['job'];
            $praticien->type_id = $data['type_id'];

            $praticien->save();
            session()->flash('message', ['type' => 'success', 'text' => __('Praticien créée avec succès.')]);

            return redirect()->route('praticien.index');
        } else {
            abort(401);
        }
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
    public function edit(Praticien $praticien)
    {
        if (Auth::user()->isA('admin')) {

            $types = Type::all();

            return view('praticien.edit', compact('types', 'praticien'));
        } else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Praticien $praticien)
    {
        if (Auth::user()->isA('admin')) {

            $data = $request->all();
            $praticien = Praticien::findOrFail($praticien->id);

            $praticien->nom = $data['nom'];
            $praticien->job = $data['job'];
            $praticien->type_id = $data['type_id'];

            $praticien->save();

            session()->flash('message', ['type' => 'success', 'text' => __('Praticien modifiée avec succès.')]);

            return redirect()->route('praticien.index');
        } else {
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Praticien $praticien)
    {
        if (Auth::user()->isA('admin')) {

            $praticien->delete();
            session()->flash('message', ['type' => 'success', 'text' => __('Praticien supprimée avec succès.')]);

            return redirect()->route('praticien.index');
        } else {
            abort(401);
        }
    }

    /**
     * Restore a soft-deleted resource.
     */
    public function restore($id)
    {
        if (Auth::user()->isA('admin')) {

            $praticien = Praticien::withTrashed()->findOrFail($id);
            $praticien->restore();

            session()->flash('message', ['type' => 'success', 'text' => __('Praticien restaurée avec succès.')]);
            return redirect()->route('praticien.index');
        } else {
            abort(401);
        }
    }
}
