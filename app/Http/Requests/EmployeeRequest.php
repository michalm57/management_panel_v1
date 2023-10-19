<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email,' . $this->route('employee'),
            'diet_preferences' => 'array|exists:diet_preferences,id',
        ];
    }

    public function messages()
    {
        return [
            'company_id.exists' => 'Invalid company.',
            'diet_preferences.exists' => 'Invalid diet preference.',
        ];
    }
}