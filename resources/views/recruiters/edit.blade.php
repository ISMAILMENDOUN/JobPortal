@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Job Offer') }}</div>

                <div class="card-body">
                    <form action="{{route('updateJob',['job'=>$job])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required value="{{$job->title}}">
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" required value="{{$job->location}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5"
                                required >{{$job->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="requirements">Requirements</label>
                            <textarea name="requirements" id="requirements" class="form-control" rows="3"
                                required >{{$job->requirements}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="benefits">Benefits</label>
                            <textarea name="benefits" id="benefits" class="form-control" rows="3" required >{{$job->benefits}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" name="salary" id="salary" class="form-control" required value="{{$job->salary}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Job Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection