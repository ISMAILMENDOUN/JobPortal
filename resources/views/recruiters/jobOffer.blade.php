@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Candidates Applied to Job Offer') }}</div>

                    <div class="card-body">
                        <h5>{{ $jobOffer->title }}</h5>
                        <p>Description: {{ $jobOffer->description }}</p>

                        @if ($candidates->count() > 0)
                            <ul class="list-group">
                                @foreach ($candidates as $candidate)
                                    <li class="list-group-item">{{ $candidate->name }} ({{ $candidate->email }})</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No candidates have applied yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
