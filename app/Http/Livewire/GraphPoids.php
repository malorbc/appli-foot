<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Statistique;

class GraphPoids extends Component
{
    public $type;
    public $style;
    public $legend;
    public $canvasId;

    public function render()
    {

        $tabTest = [];
        $user_id = auth()->user()->id;
        $stats = Statistique::where('user_id', $user_id)->get()->whereIn('type', '2');

        $tabStats = [];
        foreach ($stats as $stat) {
            array_push($tabTest, $stat);
        }
        // dd($tabTest);
        // usort($tabStats, function ($obj_a, $obj_b) {
        //     if (
        //         $obj_a->date == $obj_b->date
        //     ) {
        //         array_push($tabTest, $obj_a);
        //     }
        // });

        // dd($tabTest);
        $this->stats = json_encode($tabTest);

        // dd($this->stats);
        $this->tabTest = $tabTest;
        return view('livewire.graph-poids');
    }
}
