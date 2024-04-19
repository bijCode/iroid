@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Companies</h3>
        <div class="card-tools">
            <a href="{{ route('companiesAdd') }}" class="btn btn-primary">Add Company</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Contact Number</th>
                    <th>Annual Turnover</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($companies)
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->description }}</td>
                            <td>{{ $company->contact_number }}</td>
                            <td>{{ $company->annual_turnover }}</td>
                            <td>
                                <a href="{{ route('editCompany', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    {{ $companies->links() }}
                @else
                    No results
                @endisset
            </tbody>
        </table>
    </div>
</div>
@stop
