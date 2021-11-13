<x-app-layout class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le club') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-5">
            @foreach ($errors->all() as $error)
                <span class="block text-red-500">{{$error}}</span>
            @endforeach
        </div>
        <form action="{{ route('admin.clubs.update', $club) }}" method="post" enctype="multipart/form-data" class="p-5 bg-white shadow-sm rounded-lg">
            @method('put')
            @csrf
            <x-label for="name" value="Nom du club"/>
            <x-input id="name" class="block w-full" type="text" name="name" value="{{$club->name}}" placeholder="{{$club->name}}"/>

            <x-button class="mt-5 bg-indigo-500 hover:bg-indigo-300">Modifier le club</x-button>

            <a href="/dashboard">
                <x-button class="mt-5 bg-white hover:border-indigo-300 text-indigo-500 hover:text-indigo-300 border-2 border-indigo-500">Annuler</x-button>
            </a>
        </form>
    </div>
</x-app-layout>