<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outranking extends Model
{
    protected $fillable = [
        'employee_1_id',
        'employee_2_id',
        'criteria_id',
        'preference_value',
    ];

    /**
     * Get the employee1 that owns the Outranking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee1(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_1_id');
    }

    public function employee2()
    {
        return $this->belongsTo(Employee::class, 'employee_2_id');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
