<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Ajouter un évènement') }}
        </h2>
    </x-slot>
    <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col p-4 bg-white shadow-sm rounded-lg m-4" x-data="{open : false}">
        @csrf
        <div class="mb-2 w-100">
          <x-label for="title" value="Titre"/>
          <x-input id="title" class="block w-full" type="text" name="title" placeholder="Titre de l'évènement"/>
        </div>
        <div class="mb-2 w-100">
          <x-label>Description</x-label>
          <x-textarea id="description" name="description" class="border-gray-300 w-full"/>
        </div>
        <div class="mb-2">
          <x-label for="category" value="Type d'évènement"/>
          <select name="category" id="category" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full text-gray-700">
              @foreach($category as $categorie)
              <option value="{{$categorie->id}}">{{$categorie->name}}</option>
              @endforeach
          </select>
        </div>
        <div class="mb-2 flex">
          <div class="w-full mr-1">
            <x-label for="start" value="Date"/>
            <x-input id="start" class="block w-full text-gray-500" type="date" name="start"/>
          </div>
          <div class="w-full ml-1">
            <x-label for="start" value="Heure"/>
            <x-input id="hour" class="block w-full text-gray-500" type="time" name="startHour"/>
          </div>
        </div>
        <div class="mb-2">
            <x-input id="isEnd" name="isEnd" type="checkbox" @click="open = !open" class="inline-block"/>
            <x-label for="isEnd" value="Définir une date de fin ?" class="ml-1 inline-block"/>
        </div>
        <div class="mb-2 flex" x-show="open" x-transition>
          <div class="w-full mr-1">
            <x-label for="end" value="Date"/>
            <x-input id="end" class="block w-full text-gray-500" type="date" name="end"/>
          </div>
          <div class="w-full ml-1">
            <x-label for="endHour" value="Heure"/>
            <x-input id="endHour" class="block w-full text-gray-500" type="time" name="endHour"/>
          </div>
        </div>
        <div>
            @foreach ($joueurs as $joueur)
                <p>{{$joueur->name}}</p>
            @endforeach
        </div>
        <!--Boutons -->
        <div class="flex justify-end pt-2">
            <a href="{{route('agenda.index')}}">
                <x-button type="button" class="bg-indigo-200 hover:bg-indigo-100 mr-3 px-4 normal-case">Annuler</x-button>
            </a>
            <x-button class="bg-indigo-500 hover:bg-indigo-400 px-4 normal-case" id="#buttonAddEvent">Ajouter</x-button>
        </div> 
    </form>
      
</x-app-layout>