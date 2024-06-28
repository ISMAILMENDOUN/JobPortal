<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
public function apply(Request $request,Job $job){
$application=new Application();
$application->candidate_id=Auth::user()->id;
$application->job_id=$job->id;
$application->save(); 
return redirect()->route('candidates.candidate',[
    'user' => Auth::user()->id])->with(
    'success' ,'You Applied Successfully'
); }
}
