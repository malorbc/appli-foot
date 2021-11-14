<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Club;
use Carbon\Carbon;

class ClubRequest extends Model
{
    use HasFactory;
    protected $table = 'clubrequests';
    protected $fillable = ['club_id', 'user_id', 'status'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timestamp()
    {
        return Carbon::parse($this->attributes['created_at'])->isoFormat('dddd D MMMM');
    }
}
