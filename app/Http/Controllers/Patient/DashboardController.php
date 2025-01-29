<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:patient']);
    }

    public function index(Request $request)
    {
        $patient = $request->user()->patient;
        $upcomingAppointments = $patient->appointments()
            ->where('appointment_date', '>=', now())
            ->with('doctor.user')
            ->get();

        return view('patient.dashboard', compact('upcomingAppointments'));
    }
}
