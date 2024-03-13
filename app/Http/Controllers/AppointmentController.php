<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::latest()->get();
        $patients = Patient::latest()->get();
        return view("appointments.appointments", compact('patients' , 'appointments')) ;
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
        $validatedData = $request->validate([
            'patient_id' => ['required', 'numeric', 'exists:patients,id'],
            'appointment' => ['required', 'date'],
            'notes' => ['nullable', 'string'],
        ]);

        // Parse appointment date
        $appointmentDate = Carbon::parse($validatedData['appointment']);

        // Calculate re_appointment date (10 days after appointment)
        $validatedData['re_appointment'] = $appointmentDate->addDays(10)->toDateString();

        // Create the appointment instance using the validated data
    $appointment  = Appointment::create([
            'patient_id' => $validatedData['patient_id'],
            'appointment' => $validatedData['appointment'], // Make sure to include 'appointment' field
            're_appointment' => $validatedData['re_appointment'],
            'notes' => $validatedData['notes'],
        ]);

        return redirect()
            ->back()
            ->with('status', 'success');
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
    public function destroy(Request $request,string $id)
    {
        Appointment::findOrFail($request->appointment_id)->delete();

        return redirect()
            ->back()
            ->with("status" , 'Success');
    }
}
