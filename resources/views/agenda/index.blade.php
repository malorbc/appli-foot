<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>
    <div>
        <livewire:calendar :event="$event" :admin='0'/>
    </div>
</x-app-layout>