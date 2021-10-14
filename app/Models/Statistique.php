<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    use HasFactory;
    protected $fillable = ['value', 'date', 'type', 'user_id', 'type_id'];
}
