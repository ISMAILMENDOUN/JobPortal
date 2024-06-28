@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <h2>Admin Panel</h2>
       <a href="{{route('admins.candidates')}}">{{_('Candidates')}}</a><br><br>
       <a href="{{route('admins.recruiters')}}">{{_('Recruiters')}}</a>
       <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

    </div>
@endsection
