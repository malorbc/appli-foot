<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\EventUser;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'title', 'start', 'end', 'description', 'club_id', 'categorie_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }

    public function formatedDate($date)
    {
        if (Carbon::parse($date)->isoFormat('H:mm') == "0:00") {
            $str = Carbon::parse($date)->isoFormat('dddd D MMMM');
        } else {
            $str =  Carbon::parse($date)->isoFormat('dddd D MMMM H:mm');
        }

        return ucfirst($str);
    }

    public function participation($eventId)
    {
        $userId = auth()->user()->id;
        $event = EventUser::where('event_id', $eventId)->where('user_id', $userId)->first();
        return $event;
    }
}
