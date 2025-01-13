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
    public function show(prescription $prescription)
    {
        // $consultations = Consultation::findOrFail($consultationId);
        // $medicaments = Medicament::withTrashed()->get();
        // $prescriptions = Prescription::where('consultation_id', $consultations->id)->withTrashed()->get();
        // $users = User::withTrashed()->get();

        // return view('prescription.index', compact('consultations', 'medicaments', 'prescriptions', 'users'));
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
    public function destroy(prescription $prescription)
    {
        //
    }
}
