<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'position',
        'department',
        'description',
    ];

    /**
     * Get all of the scores for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores(): HasMany
    {
        return $this->hasMany(EmployeeScore::class);
    }

    /**
     * Get the ranking associated with the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ranking(): HasOne
    {
        return $this->hasOne(Ranking::class);
    }
}
