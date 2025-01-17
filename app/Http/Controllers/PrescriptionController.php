<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medicament;
use App\Models\prescription;
use App\Models\User;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->query('consultation');
        $consultation = Consultation::findOrFail($id);
        $medicaments = Medicament::all();

        return view('prescription.create', compact('consultation', 'medicaments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $pgcd = function ($a, $b) {
            while ($b != 0) {
                $temp = $b;
                $b = $a % $b;
                $a = $temp;
            }
            return $a;
        };

        $data = $request->all();

        $duree = $data['duree'];
        $quantite = $data['quantite'];
        $divisor = $pgcd($quantite, $duree);
        $numerator = $quantite / $divisor;
        $denominator = $duree / $divisor;


        $prescription = new Prescription();

        $prescription->quantite = $data['quantite'];
        $prescription->duree = $data['duree'];
        $prescription->detail = $data['detail'];
        $prescription->consultation_id = $data['consultation_id'];
        $prescription->medicament_id = $data['medicament_id'];
        $prescription->ratio = $numerator . '/' . $denominator;

        $prescription->save();

        session()->flash('message', ['type' => 'success', 'text' => __('prescription crée avec succès.')]);

        return redirect()->route('consultation.show', ['consultation' => $data['consultation_id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        $consultationId = $prescription->consultation_id; // Récupérer l'ID de la consultation
        $prescription->delete();
        session()->flash('message', ['type' => 'success', 'text' => __('Prescription supprimée avec succès.')]);
        return redirect()->route('consultation.show', ['consultation' => $consultationId]);
    }

    public function restore($id)
    {
        $prescription = Prescription::withTrashed()->findOrFail($id);
        $consultationId = $prescription->consultation_id; // Récupérer l'ID de la consultation
        $prescription->restore();
        session()->flash('message', ['type' => 'success', 'text' => __('Prescription restaurée avec succès.')]);
        return redirect()->route('consultation.show', ['consultation' => $consultationId]);
    }
}
