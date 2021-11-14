<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;
    //car le nom de la table est différent de celui qu'Eloquent pense
    protected $table = 'event_user';
    protected $fillable = ['event_id', 'user_id', 'participation'];
}
