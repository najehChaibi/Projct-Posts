@extends('layouts.app')

@section('content')


<div class="clearfix">
  <a href="{{route('users.create')}}" class="btn btn-success">Add User</a>
</div>
<div class="card card-default">
    <div class="card-header">All Users</div>
    <table class="card-body">
    <table class="table">
       <thead>
       <tr>
          <th>Avater</th>
          <th>Name</th>
          <th>mail</th>
          <th>role</th>
       </tr>
    </thead>
    <tbody>
     @foreach($users as $user)
      <tr>
        <td></td>
        <td>{{$user -> name}}</td>        
        <td>{{$user -> email}}</td> 
        <td>
        @if(!$user->isAdmin())
        <form action="{{route('users.make-admin', $user->id)}}" methode="post" >
           @csrf
           <button type="submit" class="btn btn-success">Make Admin<button>
        </form>
        @else
           {{$user->role}}
        @endif
        </td> 
      </tr>
      @endforeach
      </tbody>
    </table>
    </div>
</div>
@endsection