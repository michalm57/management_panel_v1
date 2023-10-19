@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>List of Employees</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-success mb-2">Add a new employee</a>
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#companyFilterModal">
            Filter by Company
        </button>

        <table id="employees-table" class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Diet Preferences</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->company ? $employee->company->name : ''}}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            @foreach($employee->dietPreferences as $dietPreference)
                                {{ $dietPreference->preference }}
                                @if(!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('employees.modals.companyFilterModal')
@endsection