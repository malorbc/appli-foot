<?php

namespace App\Http\Livewire;

use Illuminate\Support\Arr;
use Livewire\Component;
use App\Models\Event;

class Calendar extends Component
{
    public $events = [];

    public function eventChange($event)
    {
        $e = Event::find($event['id']);
        $e->start = $event['start'];
        if (Arr::exists($event, 'end')) {
            $e->end = $event['end'];
        }
        $e->save();
    }

    public function eventAdd($event)
    {
        if (!empty($event['extendedProps']['description'])) {
            $event['description'] = $event['extendedProps']['description'];
        } else {
            $event['description'] = "Aucune description";
        }
        Event::create($event);
    }

    public function render()
    {
        $this->events = json_encode(Event::all());
        return view('livewire.calendar');
    }

    public function eventRemove($id)
    {
        Event::destroy($id);
    }
}
