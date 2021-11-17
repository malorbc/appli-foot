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
        // foreach ($stats as $stat) {
        //     $search = $stat->date;
        //     $unique = $stat->created_at;
        //     $type = $stat->type;
        //     $value = $stat->value;
        //     foreach ($stats as $indice => $stat) {
        //         // si la date est la même mais que ce n'est pas le même point dans la bdd
        //         if ($stat->date == $search && $stat->created_at != $unique && $stat->type == $type) {

        //             // alors ajout du point dans une tableau nouveau
        //             $somme = $stat->value + $value;
        //             $stat->value = $somme;
        //             array_push($tabTest, $stat);
        //             // unset($stats[$indice]);
        //         }
        //     }
        // }

        $tabStats = [];
        foreach ($stats as $stat) {
            array_push($tabTest, $stat);
        }
        dd($tabTest);
        // usort($tabStats, function ($obj_a, $obj_b) {
        //     if (
        //         $obj_a->date == $obj_b->date
        //     ) {
        //         array_push($tabTest, $obj_a);
        //     }
        // });

        // dd($tabTest);
        $this->stats = json_encode($stats);
        $this->tabTest = $tabTest;
        return view('livewire.graph');
    }
}
