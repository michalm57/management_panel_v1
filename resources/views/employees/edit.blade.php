@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Employee</h2>
        <form action="{{ route('employees.update', $employee->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}" required>
            </div>

            <div class="form-group">
                <label for="company_id">Company:</label>
                <select class="form-control" name="company_id" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
            </div>

            <div class="form-group">
                <label for="diet_preferences">Diet Preferences:</label>
                <select name="diet_preferences[]" multiple>
                    @foreach($dietPreferences as $dietPreference)
                        <option value="{{ $dietPreference->id }}" {{ in_array($dietPreference->id, $employee->dietPreferences->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $dietPreference->preference }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection