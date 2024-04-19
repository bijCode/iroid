@extends('adminlte::page')

@section('title', 'Add Company')

@section('content_header')
    <h1>Add Company</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('storeCompany') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="annual_turnover">Annual Turnover</label>
                    <input type="number" id="annual_turnover" name="annual_turnover" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
