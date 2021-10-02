<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>  
  <style>
    .modal {
      transition: opacity 0.25s ease;
    }
    .body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
  </style>
  <div class="body flex items-center">
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-50">
      <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
      <div id="addEvent" class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
          <!-- Add margin if you want to see some of the overlay behind the modal-->
          <div class="modal-content py-4 text-left px-6">
          <!--Title-->
          <div class="flex justify-between items-center pb-3">
              <p class="text-2xl font-bold">Nouvel évènement</p>
              <div class="modal-close cursor-pointer z-50">
                  <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                  </svg>
              </div>
          </div>
          <!--Body-->
          <div class="flex w-100 flex-col" x-data="{open : false}">
            <div class="mb-2 w-100">
              <x-label for="titre" value="Titre"/>
              <x-input id="titre" class="block w-full" type="text" name="titre" placeholder="Titre de l'évènement"/>
            </div>
            <div class="mb-2 w-100">
              <x-label>Description</x-label>
              <x-textarea id="description" class="border-gray-300 w-full"/>
            </div>
            <div class="mb-2">
              <x-label for="category" value="Type d'évènement"/>
              <select name="category" id="category" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full text-gray-700">
                  @foreach($category as $key => $value)
                  <option value="{{$key}}">{{$value->name}}</option>
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
                <x-input id="hour" class="block w-full text-gray-500" type="time" name="start"/>
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
          <!--Footer-->
          <div class="flex justify-end pt-2">
            <x-button class="bg-indigo-200 hover:bg-indigo-100 mr-3 px-4 normal-case">Annuler</x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-400 px-4 normal-case" id="#buttonAddEvent">Ajouter</x-button>
          </div> 
      </div>
  </div>
</div>
  </div>
  <livewire:calendar />
</x-app-layout>
<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('.body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

    function getInfosFromModale(){
      titre = document.querySelector('#addEvent #titre').value;
      description = document.querySelector('#addEvent #description').value;
      start = document.querySelector("#addEvent #start").value;
      hour = document.querySelector("#addEvent #hour").value;

      isEnd = document.querySelector("#addEvent #isEnd").value;
      if(isEnd){
          end = document.querySelector("#addEvent #end").value;
          hourEnd = document.querySelector("#addEvent #hourEnd").value;
      }
      console.log(titre);
      console.log(description);
      console.log(start);
      console.log(hour);
    }     
  </script>