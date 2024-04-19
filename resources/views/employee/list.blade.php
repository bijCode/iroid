@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Employees</h3>
        <div class="card-tools">
            <a href="{{ route('employeeAdd') }}" class="btn btn-primary">Add Employee</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($employees)
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->mobile_number }}</td>
                            <td>
                                <a href="{{ route('editEmployee', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    {{ $employees->links() }}
                @else
                    No results
                @endisset
            </tbody>
        </table>
    </div>
</div>
@stop
