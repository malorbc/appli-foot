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
  
  {{-- <button class="modal-open bg-gray-200 font-bold py-2 px-4">Ouvrir popu</button> --}}
  
  <!--Modal-->
        <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center z-50">
                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <div class="modal-close absolute top-0 left-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                        <span class="text-sm">(Esc)</span>
                    </div>
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
                    <div class="flex w-100 flex-col">
                      <div class="mb-2 w-100">
                        <x-label>Titre de l'évènement</x-label>
                        <x-input class="bg-indigo-100 w-100"></x-input>
                      </div>
                      <div class="mb-2 w-100">
                        <x-label>Description</x-label>
                        <x-textarea class="bg-indigo-100 w-100"></x-textarea>
                      </div>
                      <div>
                        <x-label for="category" value="Catégorie du post"/>
                      {{-- <select name="category" id="category">
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select> --}}
                      </div>
                    </div>
                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                      <x-button class="bg-indigo-200 hover:bg-indigo-100 mr-3 px-4 normal-case">Ajouter</x-button>
                      <x-button class="bg-indigo-500 hover:bg-indigo-400 px-4 normal-case">Annuler</x-button>
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
    
     
  </script>