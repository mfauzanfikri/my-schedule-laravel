<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'employee_position_id',
        'card_id',
        'name',
        'status'
    ];
}
