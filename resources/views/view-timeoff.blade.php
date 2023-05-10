<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Time Off') }}
        </h2>
    </x-slot>

    <x-template.show-timeoff :$leave />

</x-app-layout>
