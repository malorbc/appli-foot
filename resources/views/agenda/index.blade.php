<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>
    @if (Auth::user()->role == "staff")
        <a href="{{route('agenda.create')}}">
            <x-button class="bg-indigo-500 hover:bg-indigo-300 rounded-none" style="margin:10px;">Ajouter un évènement</x-button>
        </a>
    @endif
  <livewire:calendar :event="$event"/>
</x-app-layout>