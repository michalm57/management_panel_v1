<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietPreference extends Model
{
    protected $table = 'diet_preferences';
    protected $fillable = ['preference'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}