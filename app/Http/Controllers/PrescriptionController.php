<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions = Prescription::latest()->get();
        $patients = Patient::latest()->get();
        return view("prescriptions.prescriptions" , compact('patients' , 'prescriptions'));
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

        $validated_data = $request->validate([
            'patient_id'=>["required" ,'exists:patients,id'],
            'prescription'=>["required" ,'string'],
        ]);


        Prescription::create($validated_data);

        return redirect()->back()->with('status' , 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

        dd($request->all());
        // Validate request data
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'prescription' => 'required',
        ]);

        // Find the prescription by ID
        $prescription = Prescription::findOrFail($request->appointment_id);

        // Update prescription with new data
        $prescription->patient_id = $request->input('patient_id');
        $prescription->prescription = $request->input('prescription');
        $prescription->save();

        // Redirect back with success message
        return redirect()->back()->with('status', 'success')->with('message', 'Prescription updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id , Request $request)
    {
        Prescription::findOrFail($request->prescription_id)->delete();
        return redirect()->back()->with('status' , 'success');
    }
}
