<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'event_date', 'format'];

    // This function will allow for an easy relationship if you decide to implement a registration model
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
