<?php

namespace App\Http\Livewire;

use App\Models\Statistique;
use Livewire\Component;

class Graph extends Component
{
    public $type;
    public $style;
    public $canvasId;

    public function render()
    {
        $user_id = auth()->user()->id;
        $stats = Statistique::where('user_id', $user_id)->get()->whereIn('type', $this->type);
        $this->stats = json_encode($stats);
        return view('livewire.graph');
    }
}
