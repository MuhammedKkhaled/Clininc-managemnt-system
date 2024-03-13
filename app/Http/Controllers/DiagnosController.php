<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DiagnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnoses = Diagnose::latest()->get();
        $patients = Patient::latest()->get();
        return view('diagnoses.diagnoses' , compact('patients' , 'diagnoses'));
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
    public function store(Request $request): RedirectResponse
    {

        $validated_data = $request->validate([
            'patient_id' => ['required', 'numeric', 'exists:patients,id'],
            'first_diagnose'=>['required' , 'string'],
            'final_diagnose'=>['nullable' , 'string'],
            'history'=>['nullable' , 'string'],
        ]);

        Diagnose::create($validated_data);

        return redirect()
            ->back()
            ->with("status" , "success");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
        Diagnose::findOrFail($request->diagnose_id)->delete();

        return redirect()
            ->back()
            ->with("status",'success' );
    }
}
