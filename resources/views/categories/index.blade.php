@extends('layouts.app')

@section('content')
@if(session()->has('error'))
<div class="alert alert-danger">
     {{session()->get('error')}}
     </div>
@endif

<div class="clearfix">
  <a href="{{route('categories.create')}}" class="btn btn-success">Add Gategories</a>
</div>
<div class="card card-default">
    <div class="card-header">All Categories</div>
    <div class="card-body">
    <table>
    <tbody>
     @foreach($categories as $category)
      <tr>
        <td>{{$category -> name}}</td>

        
       <td> <form action="{{route('categories.destroy', $category->id)}}"  method="POST">
         @csrf
         @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
        </form></td>
        <td> <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-primary float-right">UPDATE</a></td>
      </tr>
      @endforeach
      </tbody>
    </table>
    </div>

</div>
@endsection