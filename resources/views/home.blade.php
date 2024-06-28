@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div id="home-content">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (request()->has('message'))
        <div class="alert alert-danger">
            {{ request()->get('message') }}
        </div>
    @endif
        <h1>Welcome to Your Job Portal</h1>
        <p>Find your dream job or recruit top talent.</p>
        <!-- Add more content specific to home page -->
    </div>
@endsection
