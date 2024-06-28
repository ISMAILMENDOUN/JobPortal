<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function addJob(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'requirements' => 'required',
            'benefits' => 'required',
            'salary' => 'required',
        ]);
        $user = Auth::user();
        $companyName = $user->name;
       
        $job = new Job();
        $job->company = $companyName;
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->location = $request->input('location');
        $job->requirements = $request->input('requirements');
        $job->benefits = $request->input('benefits');
        $job->salary = $request->input('salary');

       
        $user = Auth::user();
        $job->user()->associate($user);

       
        $job->save();

        return redirect()->Route('recruiters.recruiter',['user'=>Auth::user()])->with('success', 'Job created successfully!');

    }

    public function updateJob(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'requirements' => 'required',
            'benefits' => 'required',
            'salary' => 'required',
        ]);

        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->location = $request->input('location');
        $job->requirements = $request->input('requirements');
        $job->benefits = $request->input('benefits');
        $job->salary = $request->input('salary');

        $job->save();

        return redirect()->Route('recruiters.recruiter',['user'=>Auth::user()])->with('success', 'Job updated successfully!');
    }
    public function deleteJob(Job $job)
    {
        $job->delete();

        return redirect()->route('recruiters.recruiter',['user'=>Auth::user()])->with('success', 'Job deleted successfully!');
    }
    public function search(Request $request)
    {
        
        $request->validate([
            'query' => 'required|string',
        ]);

      
        $search = $request->input('query');

       
        $jobs = (new Job())->search($search);

       
        return view('candidates.index', compact('jobs', 'search'));
    }
  
}
