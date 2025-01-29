<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-lg">Upcoming Appointments</h3>
                        <a href="{{ route('appointments.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Book Appointment
                        </a>
                    </div>

                    @if ($upcomingAppointments->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2">Date</th>
                                        <th class="px-4 py-2">Time</th>
                                        <th class="px-4 py-2">Doctor</th>
                                        <th class="px-4 py-2">Status</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upcomingAppointments as $appointment)
                                        <tr>
                                            <td class="border px-4 py-2">
                                                {{ $appointment->appointment_date->format('Y-m-d') }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ $appointment->appointment_date->format('H:i') }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ $appointment->doctor->user->name }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                {{ ucfirst($appointment->status) }}
                                            </td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('appointments.show', $appointment) }}"
                                                    class="text-blue-600 hover:text-blue-800">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No upcoming appointments.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
