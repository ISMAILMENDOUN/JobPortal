@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div id="recruiter-content">
        <h2>Recruiters Dashboard</h2>
       <a class="d-flex justify-content-end"href="{{route('recruiters.login')}}">Login</a>
       <h2>Talents</h2>
    </div>
@endsection
