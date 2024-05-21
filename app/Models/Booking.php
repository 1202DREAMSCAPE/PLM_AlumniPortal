<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'upcoming_event_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function upcomingEvent()
    {
        return $this->belongsTo(UpcomingEvents::class, 'upcoming_event_id', 'EventID');
    }
}
