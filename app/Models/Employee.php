<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function dietPreferences()
    {
        return $this->belongsToMany(DietPreference::class, 'diet_preference_employee', 'employee_id', 'diet_preference_id');
    }
}