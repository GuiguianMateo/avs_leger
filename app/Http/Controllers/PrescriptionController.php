<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medicament;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->isA('admin') || Auth::user()->isA('praticien')) {

            $id = $request->query('consultation');
            $consultation = Consultation::findOrFail($id);
            $medicaments = Medicament::all();

            return view('prescription.create', compact('consultation', 'medicaments'));
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isA('admin') || Auth::user()->isA('praticien')) {

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

            session()->flash('message', ['type' => 'success', 'text' => __('prescription créée avec succès.')]);

            return redirect()->route('consultation.show', ['consultation' => $data['consultation_id']]);
        } else {
            abort(401);
        }
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
    public function edit(Prescription $prescription)
    {
        if (Auth::user()->isA('admin') || Auth::user()->isA('praticien')) {

            $consultations = Consultation::all();
            $medicaments = Medicament::all();

            return view('prescription.edit', compact('consultations', 'medicaments', 'prescription'));
        } else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        if (Auth::user()->isA('admin') || Auth::user()->isA('praticien')) {

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

            $prescription->quantite = $data['quantite'];
            $prescription->duree = $data['duree'];
            $prescription->detail = $data['detail'];
            $prescription->medicament_id = $data['medicament_id'];
            $prescription->ratio = $numerator . '/' . $denominator;

            $prescription->save();

            session()->flash('message', ['type' => 'success', 'text' => __('Prescription modifiée avec succès.')]);

            return redirect()->route('consultation.show', ['consultation' => $prescription->consultation_id]);
        } else {
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        if (Auth::user()->isA('admin') || Auth::user()->isA('praticien')) {

            $consultationId = $prescription->consultation_id;
            $prescription->delete();

            session()->flash('message', ['type' => 'success', 'text' => __('Prescription supprimée avec succès.')]);
            return redirect()->route('consultation.show', ['consultation' => $consultationId]);
        } else {
            abort(401);
        }
    }

    /**
     * Restore a soft-deleted resource.
     */
    public function restore($id)
    {
        if (Auth::user()->isA('admin') || Auth::user()->isA('praticien')) {

            $prescription = Prescription::withTrashed()->findOrFail($id);
            $consultationId = $prescription->consultation_id;
            $prescription->restore();

            session()->flash('message', ['type' => 'success', 'text' => __('Prescription restaurée avec succès.')]);
            return redirect()->route('consultation.show', ['consultation' => $consultationId]);
        } else {
            abort(401);
        }
    }
}
