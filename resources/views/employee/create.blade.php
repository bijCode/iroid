@extends('adminlte::page')

@section('title', 'Add Employee')

@section('content_header')
    <h1>Add Employee</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('employeeStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select id="company_id" name="company_id" class="form-control" required>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <label for="join_date">Join Date</label>
                    <input type="date" id="join_date" name="join_date" class="form-control" required>
                </div>
                <!-- Add more fields as needed -->
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@stop
