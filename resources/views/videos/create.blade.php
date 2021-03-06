<x-app-layout class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une video') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-5">
            @foreach ($errors->all() as $error)
                <span class="block text-red-500">{{$error}}</span>
            @endforeach
        </div>
        <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data" class="p-5 bg-white shadow-sm rounded-lg">
            @csrf
            <x-label for="title" value="Titre de la video"/>
            <x-input id="title" class="block w-full" type="text" name="title" placeholder="Exemple : Besançon"/>

            <x-label for="url" value="URL de la video"/>
            <x-input id="url" class="block w-full" type="url" name="url" placeholder="Exemple : Besançon"/>

            <x-button class="mt-5 bg-indigo-500 hover:bg-indigo-300">Créer la video</x-button>

            <a href="/dashboard">
                <x-button class="mt-5 bg-white hover:border-indigo-300 text-indigo-500 hover:text-indigo-300 border-2 border-indigo-500">Annuler</x-button>
            </a>
        </form>
    </div>
</x-app-layout>