<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_team',
        'away_team',
        'match_date',
        'match_time',
        'home_goal',
        'away_goal',
        'referee'
    ];
}
