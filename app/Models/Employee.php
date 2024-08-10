<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model {
    use HasFactory;

    protected $fillable = [
        'card_id',
        'name',
        'status'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class);
    }

    public function employeePosition(): BelongsTo {
        return $this->belongsTo(EmployeePosition::class);
    }
}
