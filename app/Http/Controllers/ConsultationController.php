<?php

namespace App\Http\Controllers;

use App\Models\consultation;
use App\Models\Medicament;
use App\Models\Praticien;
use App\Models\Prescription;
use App\Models\Type;
use App\Models\User;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Database\Seeders\PrescriptionMedicamentSeeder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::user()->isA('admin') || Auth::user()->isA('praticien')) {
            $consultation->statu = 'valide';
        } else {
            $consultation->statu = 'attente';
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
        $medicaments = Medicament::withTrashed()->get();
        $prescriptions = Prescription::where('consultation_id', $consultation->id)->with(['medicament'])->withTrashed()->get();
        $users = User::withTrashed()->get();

        return view('consultation.show', compact('consultation', 'medicaments', 'prescriptions', 'users'));
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
        session()->flash('message', ['type' => 'success', 'text' => __('Consultation supprimé avec succès.')]);
        return redirect()->route('consultation.index');
    }


    public function restore($id)
    {
        $consultation = Consultation::withTrashed()->findOrFail($id);
        $consultation->restore();
        session()->flash('message', ['type' => 'success', 'text' => __('Consultation restoré avec succès.')]);
        return redirect()->route('consultation.index');
    }

    public function demande(Consultation $consultation): View
    {
        $consultations = Consultation::all();

        return view('Consultation.demande', compact('consultations'));
    }

    public function statu(Request $request, Consultation $consultation): RedirectResponse
    {
        $data = $request->all();

        $consultation->statu = $data['statu'];
        $consultation->save();

        return redirect()->route(route: 'consultation.demande');
    }
}
