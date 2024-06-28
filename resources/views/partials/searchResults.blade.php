@if(isset($jobs))

    <h1>Search Results for "{{ $search }}"</h1>

    @if ($jobs->isEmpty())
        <p>No jobs found.</p>
    @else
        <ul>
            @foreach ($jobs as $job)
                <li><a href="{{route('job',['job'=>$job])}}">{{ $job->title }}</a></li>
               
            @endforeach
        </ul>
    @endif
@endif