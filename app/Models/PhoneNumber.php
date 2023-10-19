<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = ['number', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}