<div>
    <style>
        #calendar {
            padding: 10px;
            width:100%;
            height: 700px;
        }

        .calendar-container{
            display: flex;
            margin:20px;
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
    </style>
    <div wire:ignore>
        <div id='calendar'></div>
    </div>
    <div class="modale w-full h-full bg-indigo-800 fixed top-0 z-50 bg-opacity-90 flex justify-center flex-col items-center" wire:ignore style="display:none;">
        <div class="p-5 bg-white shadow-sm rounded-lg flex  flex-col w-auto sm:w-1/2">
            <div class="flex w-full justify-between items-center">
                <h3 class="text-sm">Détails de l'évènement</h3>
                {{-- <p>{{$event}}</p> --}}
                <a href="{{route('agenda.edit', $event)}}" class="cursor-pointer x-close-modale"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 hover:text-indigo-300" viewBox="0 0 20 20" fill="currentColor">
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
                editable: true,   
                
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
                document.querySelector('.titre').innerHTML = arg.event.title;
                let categorieName = "Chargement...";
                let categorie = @this.getCategoryNameById(arg.event.extendedProps.categorie_id);
                categorie.then((success)=>{
                    categorieName = success;
                    document.querySelector('.categorie').innerHTML = categorieName;
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
