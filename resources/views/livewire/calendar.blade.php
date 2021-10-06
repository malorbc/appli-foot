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
    <div class="modale" wire:ignore>
        <p>modale</p>
        <p class="titre">lalala</p>
        <p class="categorie"></p>
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
                aspectRatio:1,
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
            
            //on affiche le calendrier
            calendar.render();

            function addEventFromSelected(arg){
                // const title = prompt('Titre :');
                // const id = create_UUID();
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
                // if(confirm('supprimer ?')){
                //     arg.event.remove();
                //     @this.eventRemove(arg.event.id);
                // }
                document.querySelector('.titre').innerHTML = arg.event.title;
                let categorieName = "Chargement...";
                let categorie = @this.getCategoryNameById(arg.event.extendedProps.categorie_id);
                categorie.then((success)=>{
                    categorieName = success;
                    document.querySelector('.categorie').innerHTML = categorieName;
                })
            }
        });
    </script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' rel='stylesheet' />
    @endpush
</div>
