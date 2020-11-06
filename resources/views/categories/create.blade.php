@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
    {{ isset($category) ? "UPdate Category" : "Add a new Category"}}</div>
    <div class="card-body">
        <form  action="{{route ('categories.store')}}" method="POST">
        @csrf
        <!-- @if(isset($category))
        @method('PUT')
        @endif 
        "{{isset($category) ?  route('categories.update', $category->id) : ('categories.store')}}" -->
           <div class="form-group">
             <label>Categories Name:</label>
             <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror" value="{{ isset($category) ? $category->name : '' }}" placeholder="Add a new category">
             @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-success">{{ isset($category) ? "Save" : "Add"}}</button>
            </div>
        </form>
    </div>
</div>
@endsection