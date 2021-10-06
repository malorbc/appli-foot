<?php

namespace App\Http\Livewire;

use Illuminate\Support\Arr;
use Livewire\Component;
use App\Models\Event;
use App\Models\Category;

class Calendar extends Component
{
    public $events = [];
    // public $categories = [0 => "test""n => "autre test"];
    public $categories = [];

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
        $clubId = auth()->user()->club_id;

        $events = Event::where('club_id', $clubId)->get();
        foreach ($events as $event) {
            if ($event->categorie_id == 1) {
                $event->color = 'blue';
            } else if ($event->categorie_id == 3) {
                $event->color = '#aabb11';
            } else if ($event->categorie_id == 2) {
                $event->color = "#123456";
            }
        }

        $this->events = json_encode($events);
        return view('livewire.calendar');
    }

    public function eventRemove($id)
    {
        Event::destroy($id);
    }

    public function functionTest()
    {
        $categories = Category::all();
        $this->categories = $categories;
        // dd($this);
    }

    public function getCategoryNameById($id)
    {
        $categorie = Category::find($id);
        return $categorie->name;
    }
}
