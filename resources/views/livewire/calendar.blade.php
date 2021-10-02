<div>
    <style>
        #calendar {
            padding: 10px;
            width:90%;
            height: 700px;
        }

        .calendar-container{
            display: flex;
            margin:20px;
        }

        .evts{
            width:20%;
            padding: 10px;
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
    <div>
        {{-- <x-button wire:click="functionTest">Afficher les catégories</x-button>
        @foreach ($categories as $categorie)
            <p>{{ $categorie->name }} </p>
        @endforeach --}}
        <div class="calendar-container p-6 bg-white border-b border-gray-200" wire:ignore>
            <div class="evts" id="events">
                <div class="dropEvent new modal-open bg-indigo-500 text-white">Nouvel évènement</div>
                <div data-event='{"title":"Match"}' class="dropEvent bg-indigo-300 text-white">Match</div>
                <div data-event='{"title":"Entrainement"}' class="dropEvent bg-indigo-300 text-white">Entrainement</div>
            </div>
            <div id='calendar'></div>
            
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

            //creation d'un nouveau calendrier 
            const Calendar = FullCalendar.Calendar;
            const calendarEl = document.getElementById('calendar');
            const calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    //les éléments de navigations du calendrier
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek'
                },
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
                select: info => {addEventFromSelected(info)},
                eventReceive: info => {receiveEvent(info)},
                eventClick: info => {clickEvent(info)}
            }); 

            const Draggable = FullCalendar.Draggable;
            new Draggable(document.getElementById('events'), {
                itemSelector: '.dropEvent'
            });
            
            //on affiche le calendrier
            calendar.render();

            function addEventFromSelected(arg){
                // const title = prompt('Titre :');
                // const id = create_UUID();

                toggleModal();
                getInfos();
                let title = "test";
                const id = create_UUID();
                let description = "description test";

                let params = {
                    id: id,
                    title: title,
                    description: description,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                };

                calendar.addEvent(params);
                // console.log(calendar.getEventById(id));
                @this.eventAdd(calendar.getEventById(id));
                calendar.unselect();
                /*if (title) {
                    calendar.addEvent({
                        id: id,
                        title: title,   
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    });
                    @this.eventAdd(calendar.getEventById(id));
                };*/

            }

            function receiveEvent(arg){
                const id = create_UUID();
                arg.event.setProp('id',id);
                @this.eventAdd(arg.event);
            }

            function clickEvent(arg){
                if(confirm('supprimer ?')){
                    arg.event.remove();
                    @this.eventRemove(arg.event.id);
                }
            }
        });

        getInfos = ()=>{
            getInfosFromModale();
        }
    </script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' rel='stylesheet' />
    
    @endpush
</div>
