<?php

namespace App\Http\Controllers;

use App\Models\consultation;
use App\Models\Praticien;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::withTrashed()->get();
        $users = User::withTrashed()->get();

        return view('consultation.index', compact('consultations','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $users = User::all();
        $praticiens = Praticien::all();

        return view('consultation.create', compact('types', 'users', 'praticiens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $consultation = new Consultation();

        $consultation->date_consultation = $data['date_consultation'];
        $consultation->type_id = $data['type_id'];
        $consultation->user_id = $data['user_id'];
        $consultation->praticien_id = $data['praticien_id'];

        if($data['date_consultation'] < now() ){

            $consultation->retard = 0;

        } elseif($data['date_consultation'] >= now() ){

            $consultation->retard = 1;

        }


        $consultation->save();

        session()->flash('message', ['type' => 'success', 'text' => __('consultation crée avec succès.')]);

        return redirect()->route('consultation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(consultation $consultation)
    {
        $types = Type::all();
        $users = User::all();
        $praticiens = Praticien::all();

        return view('consultation.edit', compact('types', 'users', 'praticiens', 'consultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, consultation $consultation)
    {
        $data = $request->all();
        $consultation = Consultation::findOrFail($consultation->id);

        $consultation->date_consultation = $data['date_consultation'];
        $consultation->statu = $data['statu'];
        $consultation->type_id = $data['type_id'];
        $consultation->user_id = $data['user_id'];
        $consultation->praticien_id = $data['praticien_id'];

        if($data['date_consultation'] < now() ){

            $consultation->retard = 0;

        } elseif($data['date_consultation'] >= now() ){

            $consultation->retard = 1;

        }


        $consultation->save();

        session()->flash('message', ['type' => 'success', 'text' => __(key: 'consultation modifié avec succès.')]);

        return redirect()->route('consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(consultation $consultation)
    {
        $consultation->delete();
        session()->flash('message', ['type' => 'success', 'text' => __('Consultation deleted successfully.')]);
        return redirect()->route('consultation.index');
    }


    public function restore($id)
    {
        $consultation = Consultation::withTrashed()->findOrFail($id);
        $consultation->restore();
        session()->flash('message', ['type' => 'success', 'text' => __('Consultation restored successfully.')]);
        return redirect()->route('consultation.index');
    }
}
