<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Statistiques') }}
        </h2>
    </x-slot>
    <div>
        @php
        $style = "bar";
        @endphp
        <livewire:graph :type="1" :style="$style" :canvasId="1"/>
    </div>
</x-app-layout>