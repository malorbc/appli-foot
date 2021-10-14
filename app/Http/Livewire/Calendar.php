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
        $events = auth()->user()->events;

        //choisir couleur de chaque evt ici
        foreach ($events as $event) {
            if ($event->categorie_id == 1) {
                // Match
                $event->color = 'rgba(245, 158, 11, 0.5)';
            } else if ($event->categorie_id == 3) {
                // Autre
                // $event->color = '#aabb11';
            } else if ($event->categorie_id == 2) {
                // Entrainement
                $event->color = "rgba(16, 185, 129,0.5)";
            }
        }

        $this->events = json_encode($events);
        $this->event = Event::find('0622ab67-58e2-4887-bb0a-32d981ff576d');
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

    public function getUserFromEvent($id)
    {
        //trouver l'event qui correspond a l'id cliquée
        $event = Event::find($id);

        //trouver tous les users qui appartiennent à cet event
        $users = $event->users;

        //json_encode pour envoyer le tableau d'user au front
        return json_encode($users);
    }
}
