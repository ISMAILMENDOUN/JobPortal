

@extends('layouts.app')
@include('partials.navbarUser')
@section('content')
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Jobs Applied By Candidate') }}</div>

                    <div class="card-body">
                    <?php 
                    $jobs=1;
                    ?>
                    @if($jobs==0)
                        @if ($jobs->count() > 0)
                            <ul class="list-group">
                                @foreach ($jobs as $job)
                                    <li class="list-group-item">{{ $job->title }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No jobs applied yet.</p>
                        @endif
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
