<x-app-layout>
  <x-slot>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Add User') }}
      </h2>
  </x-slot>

  <x-template.table-action :$user />

</x-app-layout>

