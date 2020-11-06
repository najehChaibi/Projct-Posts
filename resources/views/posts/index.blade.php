@extends('layouts.app')

@section('content')


<div class="clearfix">
  <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
</div>
<div class="card card-default">
    <div class="card-header">All Posts</div>
    <table class="card-body">
    @if($posts->count() > 0)
    <table class="table">
       <thead>
       <tr>
          <th>Image</th>
          <th>Title</th>
          <th colspan="2">Actions</th>
       </tr>
    </thead>
    <tbody>
     @foreach($posts as $post)
      <tr>
        <td><img src="{{asset('storage/'.$post->image)}}" alt="" width="100px" height="50px"></td>
        <td>{{$post -> title}}</td>        
      
        <td><form action="{{route('posts.destroy', $post->id)}}"  method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm"> {{$post->trashed() ? 'Delete' : 'Trash' }}</button>
          </form></td>
          <td>
          @if(!$post->trashed())
          <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-primary float-right">UPDATE</a>
          @endif
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
    @else
        <div class="card-body">
        <h1>Not Post Yet.</h1>
        </div>
    @endif
    </div>
</div>
@endsection