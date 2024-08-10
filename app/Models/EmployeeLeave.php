<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeLeave extends Model {
    protected $fillable = [
        'start_date',
        'end_date',
        'status'
    ];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
