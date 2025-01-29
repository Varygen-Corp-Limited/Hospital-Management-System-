<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <h3 class="font-bold text-lg">Doctors</h3>
                            <p class="text-2xl">{{ $stats['doctors'] }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <h3 class="font-bold text-lg">Patients</h3>
                            <p class="text-2xl">{{ $stats['patients'] }}</p>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <h3 class="font-bold text-lg">Total Appointments</h3>
                            <p class="text-2xl">{{ $stats['appointments'] }}</p>
                        </div>
                        <div class="bg-purple-100 p-4 rounded-lg">
                            <h3 class="font-bold text-lg">Today's Appointments</h3>
                            <p class="text-2xl">{{ $stats['today_appointments'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
