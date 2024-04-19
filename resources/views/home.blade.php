@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <!-- Dashboard widgets -->
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Companies</span>
                    <span class="info-box-number">100</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Add more widgets here -->
        </div>
    </div>
@stop
