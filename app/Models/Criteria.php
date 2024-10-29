<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = [
        'name',
        'type',
        'weight',
        'preference_type',
    ];
}
