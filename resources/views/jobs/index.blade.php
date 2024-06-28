@extends('layouts.app') 
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>{{ $job->title }}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Company: {{ $job->company }}</h5>
            <p class="card-text"><strong>Location:</strong> {{ $job->location }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $job->description }}</p>
            <p class="card-text"><strong>Requirements:</strong> {{ $job->requirements }}</p>
            <p class="card-text"><strong>Benefits:</strong> {{ $job->benefits }}</p>
            <p class="card-text"><strong>Salary:</strong> {{ $job->salary }}</p>

            <form action="{{ route('jobs.apply', ['job' => $job->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        </div>
    </div>
</div>
@endsection