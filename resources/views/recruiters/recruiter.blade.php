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
            <div class="col-md-auto">
                <div class="card w-100">
                    <div class="card-header">{{ __('Job Offers Posted By '.Auth::user()->name) }}</div>

                    <div class="card-body ">
                        @include('partials.jobs')
                        
@php
$user = auth()->user()->id;

@endphp
<a href="{{route('recruiters.create',['user'=>$user])}}">Create A Job Offer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
