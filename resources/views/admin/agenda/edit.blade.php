<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Modifier {{$event}}
        </h2>
    </x-slot>
    <p>{{$categories}}</p>
</x-app-layout>