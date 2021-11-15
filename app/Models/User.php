<?php

namespace App\Models;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\Club;
use App\Models\Statistique;
use App\Models\ClubRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use \stdClass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'poste',
        'naissance',
        'role',
        'surname',
        'image',
        'club_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function participation($eventId, $userId)
    {
        $participation = EventUser::where('user_id', $userId)->where('event_id', $eventId)->first();
        return $participation;
    }

    public function latestEvent()
    {
        $events = EventUser::where('id_user', auth()->user()->id);
        return $events;
    }

    public function age()
    {
        return Carbon::parse($this->attributes['naissance'])->age;
    }

    public function uppercasePoste()
    {
        return ucfirst($this->attributes['poste']);
    }

    public function stats($id)
    {
        $stats = Statistique::where('user_id', $id)->whereIn('type', [1])->orderBy('date', 'desc')->get()->first();
        if ($stats == null) {
            $object = new stdClass();
            $object->value = "null";
            $object->date = "0";
            return $object;
        } else {
            return $stats;
        }
    }

    public function clubrequests()
    {
        return $this->hasMany(ClubRequest::class)->latest()->limit(1);
    }

    public function playerRequests($clubId)
    {
        $playerRequests = ClubRequest::where('club_id', $clubId)->where('status', 0)->get();
        return $playerRequests;
    }

    public function getDate($date)
    {
        if ($date == "0") {
            return "Ajoutez une donnée";
        } else {
            $formatedDate = Carbon::parse($date)->translatedFormat('d F Y');
            return "Le " . $formatedDate;
        }
    }
}
