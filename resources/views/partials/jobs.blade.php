@php 
use Illuminate\Support\Facades\Auth;
 $user=Auth::user();
            $jobOffers=$user->jobs;
            @endphp
@if(isset($jobOffers) && $jobOffers->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Location</th>
                <th>Description</th>
                <th>Requirements</th>
                <th>Benefits</th>
                <th>Salary</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead>
        <tbody>
           
            @foreach ($jobOffers as $jobOffer)
                <tr>
                    <td>{{ $jobOffer->id }}</td>
                    <td>{{ $jobOffer->title }}</td>
                    <td>{{ $jobOffer->location}}</td>
                    <td>{{ $jobOffer->description}}</td>
                    <td>{{ $jobOffer->requirements }}</td>
                    <td>{{ $jobOffer->benefits }}</td>
                    <td>{{ $jobOffer->salary }}</td>
                    <td>{{ $jobOffer->created_at }}</td>
                    <td>{{ $jobOffer->updated_at }}</td>
                    <td> <form action="{{route('editJob',['job'=>$jobOffer])}}" method="get" style="display: inline-block;">
                            @csrf
                            @method('get')
                            <button type="submit" class="btn btn-sm btn-primary" >Edit</button>
                        </form>
                        </td>
                        <td>
                        <form action="{{route('deleteJob',['job'=>$jobOffer])}}" method="Post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No job offers found.</p>
@endif