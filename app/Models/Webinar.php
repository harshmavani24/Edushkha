<?php

// app/Models/Webinar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $fillable = ['title', 'description', 'date_time'];
    // Define relationships if needed
}
