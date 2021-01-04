<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold leading-tight text-gray-900">
            {{ auth()->user()->currentTeam->name }}
        </h2>
    </x-slot>

    <livewire:dashboard />

</x-app-layout>
