@extends('layouts.app')
@include('partials.navbar')
@section('content')

    <div id="candidate-content">
        <h2>Job Search</h2> 
        <a class="d-flex justify-content-end"href="{{route('candidates.login')}}">Login</a>
        @include('partials.searchbar')
        @include('partials.searchResults')
        <h2>Job Offers</h2> 
    </div>
@endsection
