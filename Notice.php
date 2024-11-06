<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',          // active or inactive
        'starting_date',    // start date for the notice
        'ending_date',      // end date for the notice
        'priority',         // important or normal
    ];
}
