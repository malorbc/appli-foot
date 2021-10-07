<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Ajouter un évènement') }}
        </h2>
    </x-slot>
    <div class="my-5">
      @foreach ($errors->all() as $error)
          <span class="block text-red-500">{{$error}}</span>
      @endforeach
    </div>
    <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data" class="flex flex-col" x-data="{open : false}">
        @csrf
        <div class="flex sm:flex-row flex-col">
          <div class="bg-white shadow-sm rounded-lg p-4 m-4 sm:w-1/2 w-auto">
            <h3 class="font-bold text-indigo-500 mb-4 text-xl">Informations de l'évènement</h3>
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
          </div>
          <div class="bg-white shadow-sm rounded-lg p-4 m-4 sm:w-1/2 w-auto">
            <h3 class="font-bold text-indigo-500 mb-4 text-xl">Participants</h3>
            <div>
              <h4>Membres du staff</h4>
              @foreach ($joueurs as $joueur)
                  @if($joueur->role == 'staff')
                  <div>
                    <x-input name="users[]" value="{{$joueur->id}}" type="checkbox" class="inline-block user-check"/>
                    @if($joueur->id == Auth::user()->id)
                    <x-label for="users[]" value="{{$joueur->name}} {{$joueur->surname}} (moi)" class="ml-1 inline-block"/>
                    @else
                    <x-label for="users[]" value="{{$joueur->name}} {{$joueur->surname}}" class="ml-1 inline-block"/>
                    @endif
                  </div>
                  @endif
              @endforeach
              <h4>Joueurs</h4>
              @foreach ($joueurs as $joueur)
                  @if($joueur->role == 'joueur')
                  <div>
                    <x-input name="users[]" value="{{$joueur->id}}" type="checkbox" class="inline-block user-check" onclick="uncheckToggleAll()"/>
                    <x-label for="users[]" value="{{$joueur->name}} {{$joueur->surname}} - {{$joueur->poste}}" class="ml-1 inline-block"/>
                  </div>
                  @endif
              @endforeach
              <div>
                <x-input name="user-all" type="checkbox" class="inline-block toggle-all" onclick="toggleAllCheckboxes('.user-check')"/>
                <x-label for="user-all" value="Tout cocher" class="inline-block ml-1 mt-4 text-indigo-300"/>
              </div>
          </div>
          </div>
        </div>
        <!--Boutons -->
        <div class="flex justify-end pt-2 mr-4 mb-24 sm:mb-0">
            <a href="{{route('agenda.index')}}">
                <x-button type="button" class="bg-indigo-200 hover:bg-indigo-100 mr-3 px-4 normal-case">Annuler</x-button>
            </a>
            <x-button class="bg-indigo-500 hover:bg-indigo-400 px-4 normal-case" id="#buttonAddEvent">Ajouter</x-button>
        </div> 
    </form>
    <script>
      function toggleAllCheckboxes(elementName) {
        const checkboxes = document.querySelectorAll(elementName);
        checkboxes.forEach(function (ele) {
            ele.toggleAttribute('checked');
        });
    }

    function uncheckToggleAll(){
      const toggleAll = document.querySelector('.toggle-all');
      toggleAll.setAttribute('checked', '');
    }
    </script>
</x-app-layout>