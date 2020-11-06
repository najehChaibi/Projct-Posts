@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
    {{ "Add a new Tag"}}</div>
    <div class="card-body">
        <form  action="{{route ('tags.store')}}" method="POST">
        @csrf
        <!-- @if(isset($category))
        @method('PUT')
        @endif 
        "{{isset($category) ?  route('categories.update', $category->id) : ('categories.store')}}" -->
           <div class="form-group">
             <label>Tags Name:</label>
             <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror"  placeholder="Add a new category">
             @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection