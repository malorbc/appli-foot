<div>
    <style>
        #calendar {
            height: 700px;
        }

        .btn-add-event{
            /* margin:0px !important; */
        }
        .evts div{
            padding:10px 20px;
            border-radius:5px;
            margin-right:30px;
            margin-bottom:10px;
        }

        .evts div:hover{
            cursor: pointer;
        }

        .evts div:active{
            color:red;
        }

        .fc-button-group .fc-button-primary{
            background-color:#a5b4fc !important;
            border-color:#a5b4fc !important;
        }

        .fc-button-group .fc-button-primary:hover{
            background-color:rgba(99, 102, 241, 1) !important;
            border-color:rgba(99, 102, 241, 1) !important;
        }   

        .fc .fc-daygrid-day.fc-day-today{
            background-color:rgba(99, 102, 241, 0.1) !important;
        }

        .calendar-container{
            /* width:80rem; */
        }

        .match{
            color:rgba(245, 158, 11, 0.5);
        }

        .entrainement{
            color:rgba(16, 185, 129,0.5);
        }

        @media screen and (max-width:512px){
            .fc-header-toolbar{
                display: flex;
                flex-direction: column;
                align-items: flex-start !important;
            }
        }
    </style>
    <div wire:ignore>
        <div class="flex flex-col-reverse sm:flex-row-reverse mx-8 mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white rounded-lg w-full sm:w-3/4 mb-4 shadow">
                <div id='calendar'></div>
            </div>
            <div class="legende w-full mb-4 sm:mb-0 sm:w-1/4 p-4 bg-white rounded-lg shadow mr-4" style="height:max-content">
                @if (Auth::user()->role == "staff")
                    <a href="{{route('admin.agenda.create')}}">
                        <x-button class="bg-indigo-500 hover:bg-indigo-300 rounded-none mb-4 w-full flex justify-between">Ajouter un évènement <svg xmlns="http://www.w3.org/2000/svg" class="w-6 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                          </svg></x-button>
                    </a>
                @endif
                <p class="font-bold text-indigo-500 mt-4 border-b-2">Informations supplémentaires</p>
                <div class="labels">
                    <div class="flex items-center mt-2">
                        <span class="block w-10 h-4 bg-yellow-500 opacity-50 rounded-sm mr-2"></span><p>Match</p>
                    </div>
                    <div class="flex items-center mt-2">
                        <span class="block w-10 h-4 bg-green-500 opacity-50 rounded-sm mr-2"></span><p>Entrainement</p>
                    </div>
                    <div class="flex items-center mt-2">
                        <span class="block w-10 h-4 bg-indigo-500 opacity-50 rounded-sm mr-2"></span><p>Autre</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modale w-full h-full bg-indigo-800 fixed top-0 z-50 bg-opacity-90 flex justify-center flex-col items-center" wire:ignore style="display:none;">
        <div class="p-5 bg-white shadow-sm rounded-lg flex  flex-col w-auto sm:w-1/2">
            <div class="flex w-full justify-between items-center">
                <h3 class="text-sm">Détails de l'évènement</h3>
                {{-- <p>{{$event}}</p> --}}
                <a href="#" class="cursor-pointer x-close-modale"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 hover:text-indigo-300 hidden" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                  </svg></a>
            </div>
            <div>
                <h3 class="titre text-xl text-indigo-500 mt-4">Titre</h3>
                <p class="categorie italic">Catégorie</p>
                <p class="description mt-4">Description</p>
                <p class="text-sm text-indigo-300 mt-4">Participants</p>
                <ul class="users-container list-disc list-inside text-gray-500">
                </ul>  
            </div>
            <div class="modale-footer flex w-full justify-end mt-4">
                <x-button class="bg-indigo-500 hover:bg-indigo-300 mr-2 modale-close">Fermer</x-button>
                @if(Auth::user()->role == 'staff')
                <x-button class="bg-indigo-300 hover:bg-indigo-500 modale-delete">Supprimer l'évènement</x-button>
                @endif
            </div> 
        </div>
    </div>
    @push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.min.js"></script>
    <script>
        //méthode pour creer un identifiant unique UUID.
        create_UUID = () => {
            let dt = new Date().getTime();
            const uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, c => {
                let r = (dt + Math.random() * 16) % 16 | 0;
                dt = Math.floor(dt / 16);
                return (c == 'x' ? r :(r&0x3|0x8)).toString(16);
            });
            return uuid;
        }

        document.addEventListener('livewire:load', function () {

            // console.log(@this.event);

            let isAdmin = (@this.admin);
            let isEditable = false;
            console.log(isAdmin);
            if(isAdmin == 1){
                isEditable = true
            }else{
                isEditable = false
            }

            console.log(isEditable);

            //creation d'un nouveau calendrier 
            const Calendar = FullCalendar.Calendar;
            const calendarEl = document.getElementById('calendar');
            const calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    //les éléments de navigations du calendrier
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek'
                },
                // aspectRatio:1,
                //la langue du calendrier
                locale: '{{ config('app.locale') }}',
                //les evts présents sur le calendrier (récupérés depuis la classe livewire)
                events: JSON.parse(@this.events),
                eventColor: '#a5b4fc',

                //on peut modifier le calendrier
                editable: isEditable,   
                
                //fonction appelée lors du resize
                eventResize: info => @this.eventChange(info.event),

                //fonction appelée lors du drop
                eventDrop: info => @this.eventChange(info.event),
                selectable: true,

                //fonction appelée lors du select
                eventReceive: info => {receiveEvent(info)},
                eventClick: info => {clickEvent(info)}
            }); 
            
            //on affiche le calendrier
            calendar.render();

            function receiveEvent(arg){
                const id = create_UUID();
                arg.event.setProp('id',id);
                @this.eventAdd(arg.event);
            }

            function clickEvent(arg){

                @this.showEvent(arg.event.id);
                
                document.querySelector('.titre').innerHTML = arg.event.title;
                let categorieName = "Chargement...";
                let categorie = @this.getCategoryNameById(arg.event.extendedProps.categorie_id);
                categorie.then((data)=>{
                    categorieName = data;
                    console.log(categorieName.toLowerCase());
                    document.querySelector('.categorie').innerHTML = categorieName;
                    document.querySelector('.categorie').classList = "categorie italic " + categorieName.toLowerCase();
                });
                document.querySelector('.description').innerHTML = arg.event.extendedProps.description;
                document.querySelector('.modale').style.display = "flex";
                if(document.querySelector('.modale-delete') != null){
                    document.querySelector('.modale-delete').setAttribute('data-id', arg.event.id);
                }

                let usersRequest = @this.getUserFromEvent(arg.event.id);
                usersRequest.then((success)=>{
                    data = JSON.parse(success);
                    document.querySelector('.users-container').innerHTML = "";
                    data.forEach(user => {
                        document.querySelector('.users-container').innerHTML += "<li>"+user.name+" "+user.surname+"</li>";
                    });
                });

                let userParticipation = @this.getParticipationFromEvent(arg.event.id);
                userParticipation.then((data)=>{
                    data = JSON.parse(data);
                })
            }

            document.querySelector('.modale-delete').addEventListener('click',()=>{
                id = document.querySelector('.modale-delete').getAttribute('data-id');
                @this.eventRemove(id);
                event = calendar.getEventById(id);
                event.remove();
                document.querySelector('.modale').style.display = "none";
            });
        });

        document.querySelector('.modale-close').addEventListener('click', ()=>{
            document.querySelector('.modale').style.display = "none";
        })

        document.addEventListener('keyup', (e) => {
            if (e.code === "Escape") document.querySelector('.modale').style.display = "none";
        });
    </script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' rel='stylesheet' />
    @endpush
</div>
