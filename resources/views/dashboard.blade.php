<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    hi!
                </div>
                <div>
                    <ul><a href="../api/readings/1"> link 1 ../api/readings/1</a></ul>
                    <ul><a href="../api/read/lastnhours/2"> link 1 ../api/read/lastnhours/2</a></ul>
                    <ul><a href="../api/readings"> link 1 ../api/readings</a></ul>
                    <ul><a href="../fetch/250"> link 1 ../fetch/250</a></ul>
                    <ul><a href="../co2" > link 1 ../co2</a></ul>
                    {{-- <ul><a href="../api/readings/1" > link 1 ../api/readings/1</a></ul> --}}
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
