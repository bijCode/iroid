@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <h1>Edit Company</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('updateCompany', $company->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" required>{{ old('description', $company->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ old('contact_number', $company->contact_number) }}" required>
                </div>
                <div class="form-group">
                    <label for="annual_turnover">Annual Turnover</label>
                    <input type="number" id="annual_turnover" name="annual_turnover" class="form-control" value="{{ old('annual_turnover', $company->annual_turnover) }}" required>
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label> :  {{  $company->logo }}
                    <input type="file" id="logo" name="logo" class="form-control-file" accept="image/*">
                    <img id="logo-preview" src="{{ asset('storage/' . $company->logo) }}" alt="Logo Preview" style="max-width: 100px; margin-top: 10px;">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script>
        document.getElementById('logo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logo-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>
@stop
