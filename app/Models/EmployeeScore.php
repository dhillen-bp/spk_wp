<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeScore extends Model
{
    protected $fillable = [
        'employee_id',
        'criteria_id',
        'score',
    ];

    /**
     * Get the employee that owns the EmployeeScore
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(employee::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
