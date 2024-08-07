<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeSchedule extends Model {
    use HasFactory;

    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'work_type',
        'work_time',
        'status'
    ];


    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
