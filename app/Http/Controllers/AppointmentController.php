<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $appointments = [];

        if ($user->isDoctor()) {
            $appointments = $user->doctor->appointments()
                ->with('patient.user')
                ->latest()
                ->paginate(10);
        } elseif ($user->isPatient()) {
            $appointments = $user->patient->appointments()
                ->with('doctor.user')
                ->latest()
                ->paginate(10);
        } else {
            $appointments = Appointment::with(['doctor.user', 'patient.user'])
                ->latest()
                ->paginate(10);
        }

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();
        return view('appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:now',
            'notes' => 'nullable|string|max:1000',
        ]);

        $appointment = new Appointment($validated);
        $appointment->patient_id = $request->user()->patient->id;
        $appointment->status = 'scheduled';
        $appointment->save();

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment scheduled successfully.');
    }

    public function show(Appointment $appointment)
    {
        $this->authorize('view', $appointment);
        return view('appointments.show', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $this->authorize('update', $appointment);

        $validated = $request->validate([
            'status' => 'required|in:scheduled,completed,cancelled',
            'notes' => 'nullable|string|max:1000',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.show', $appointment)
            ->with('success', 'Appointment updated successfully.');
    }
}
