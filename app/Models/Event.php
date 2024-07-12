<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(Attendee::class);
    }
}
