<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Ajouter une donnée') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-5">
            @foreach ($errors->all() as $error)
                <span class="block text-red-500">{{$error}}</span>
            @endforeach
        </div>
        <form action="{{ route('statistiques.store') }}" method="post" enctype="multipart/form-data" class="p-5 bg-white shadow-sm rounded-lg">
            @csrf
            <x-label for="value" value="Valeur"/>
            <x-input id="value" class="block w-full" type="text" name="value" placeholder="10"/>

            <x-label for="date" value="Date" class="mt-4"/>
            <x-input id="date" class="block w-full" type="date" name="date" placeholder="10"/>

            <x-label for="user" value="Joueur concerné" class="mt-4"/>
            <select name="user" id="user" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full text-gray-700">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>
                @endforeach
            </select>

            <x-button class="mt-5 bg-indigo-500 hover:bg-indigo-300">Ajouter la donnée</x-button>

            <a href="{{route('statistiques.index')}}">
                <x-button class="mt-5 bg-white hover:border-indigo-300 text-indigo-500 hover:text-indigo-300 border-2 border-indigo-500" type="button">Annuler</x-button>
            </a>
        </form>
    </div>
    <script>
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });
        document.getElementById('date').value = new Date().toDateInputValue();;
        console.log(document.getElementById('date').value);
    </script>
</x-app-layout>