<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Statistiques') }}
        </h2>
    </x-slot>
    <div>
        @php
        $style = "bar";
        $legend = true;
        @endphp
        <livewire:graph :type="1" :style="$style" :canvasId="1" :legend="$legend"/>
        <livewire:graph-poids :type="1" :style="$style" :canvasId="1" :legend="$legend"/>
    </div>
</x-app-layout>