<?php

namespace App;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    function room() {
        return $this->hasManyThrough(Room::class, Channel::class, "event_id", "channel_id");
    }

    function channel() {
        return $this->hasMany(Channel::class, "event_id");
    }


    function registration() {
        return $this->hasManyThrough(Registration::class, Event_ticket::class, "event_id", "ticket_id");
    }

    function ticket() {
        return $this->hasMany(Event_ticket::class, "event_id");
    }
//    function event_ticket() {
//        return $this->hasMany(Event_ticket::class, "event_id");
//    }

    function organizer() {
        return $this->belongsTo(Organizer::class, "organizer_id");
    }
}
