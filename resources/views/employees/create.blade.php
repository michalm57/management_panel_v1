@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a New Employee</h2>
        <form action="{{ route('employees.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
            </div>

            <div class="form-group">
                <label for="company_id">Company:</label>
                <select class="form-control" name="company_id" required>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="diet_preferences">Diet Preferences:</label>
                <select class="form-control" name="diet_preferences[]" multiple>
                    @foreach($dietPreferences as $dietPreference)
                        <option value="{{ $dietPreference->id }}" {{ in_array($dietPreference->id, old('diet_preferences', [])) ? 'selected' : '' }}>
                            {{ $dietPreference->preference }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Employee</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection