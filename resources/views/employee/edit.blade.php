@extends('adminlte::page')

@section('title', 'Edit Employee')

@section('content_header')
    <h1>Edit Employee</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('updateEmployee', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $employee->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                </div>
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select id="company_id" name="company_id" class="form-control" required>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control" value="{{ $employee->mobile_number }}" required>
                </div>
                 <!-- Current Image -->
                 <div class="form-group">
                    <label for="current_image">Current Image</label>
                    <div>
                        <img src="{{ asset('storage/' . $employee->image) }}" alt="Current Image" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="join_date">Join Date</label>
                    <input type="date" id="join_date" name="join_date" class="form-control" value="{{ $employee->join_date }}" required>
                </div>
                <!-- Add more fields as needed -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop
