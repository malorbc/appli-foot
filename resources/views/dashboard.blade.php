<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg text-center pb-2 font-bold">Bienvenue, {{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
                    @if(Auth::user()->club->id == 1)
                        <p class=" md:text-center">Vous n'avez pas encore de club. Créez en un ou rejoignez-en un avant de commencer à utiliser l'application.</p>
                        <div class="py-3 flex h-16 justify-around md:max-w-sm md:m-auto">
                            <a href="{{route('clubs.create')}}" class="block h-full pr-1">
                                <x-button class="bg-indigo-500 hover:bg-indigo-300 border-2 h-full" >Créer un club</x-button>
                            </a>
                            <livewire:search/>
                        </div>
                    @else
                        <p>Votre club : <span class="font-bold">{{Auth::user()->club->name}}</span></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
