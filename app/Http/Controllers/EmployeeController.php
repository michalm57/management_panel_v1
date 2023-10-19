<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Models\DietPreference;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();
        $companies = Company::all();

        return view('employees.index', [
            'employees' => $employees,
            'companies' => $companies
        ]);
    }

    public function create()
    {
        $companies = Company::all();
        $dietPreferences = DietPreference::all();

        return view('employees.create', compact('companies', 'dietPreferences'));
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        $employee->dietPreferences()->sync($request->input('diet_preferences', []));

        return redirect()->route('employees.index')->with('success', 'Employee has been added.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        $dietPreferences = DietPreference::all();

        return view('employees.edit', compact('employee', 'companies', 'dietPreferences'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->validated());
        $employee->dietPreferences()->sync($request->input('diet_preferences', []));

        return redirect()->route('employees.index')->with('success', 'Employee data has been updated.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee has been deleted.');
    }
}