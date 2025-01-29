<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:doctor']);
    }

    public function index(Request $request)
    {
        $doctor = $request->user()->doctor;
        $todayAppointments = $doctor->appointments()
            ->whereDate('appointment_date', today())
            ->with('patient.user')
            ->get();

        return view('doctor.dashboard', compact('todayAppointments'));
    }
}
