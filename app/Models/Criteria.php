<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criteria extends Model
{
    protected $fillable = [
        'name',
        'type',
        'weight',
        'preference_type',
    ];

    /**
     * Get all of the scores for the Criteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores(): HasMany
    {
        return $this->hasMany(EmployeeScore::class);
    }

    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }

    public function outrankings()
    {
        return $this->hasMany(Outranking::class);
    }
}
