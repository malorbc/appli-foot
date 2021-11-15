<?php

namespace App\Http\Livewire;

use App\Models\Statistique;
use Livewire\Component;

class Graph extends Component
{
    public $type;
    public $style;
    public $legend;
    public $canvasId;

    public function render()
    {

        $tabTest = [];
        $user_id = auth()->user()->id;
        $stats = Statistique::where('user_id', $user_id)->get()->whereIn('type', $this->type);
        foreach ($stats as $stat) {
            // array_push($tabTest, $stat->id);
            $key = $stat->date;
        }

        // dd($tabTest);
        $this->stats = json_encode($stats);
        return view('livewire.graph');
    }
}
