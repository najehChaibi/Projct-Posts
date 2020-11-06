@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="card card-default">
    <div class="card-header">
    {{isset($post) ? "UPDATE POST" : "Add a new Post"}}
    </div>
    <div class="card-body">
        <form  action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST"  enctype='multipart/form-data' >
        @csrf     
           <div class="form-group">
             <label> Title:</label>
             <input type="text" name="title" class="form-control" class="@error('title') is-invalid @enderror"  value="{{isset($post) ? $post->title : ''}}" placeholder="Add Title">
             @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
             <label> Description:</label>
             <input type="text" name="description" class="form-control" class="@error('description') is-invalid @enderror"  value="{{isset($post) ? $post->description : ''}}" placeholder="Add Descrition">
             @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
             <label> Content:</label>
             <!-- <textarea type="text" name="content" class="form-control" class="@error('content') is-invalid @enderror"  placeholder="Add Content"></textarea> -->
             <input id="x" type="hidden" name="content"   value="{{isset($post) ? $post->content : ''}}">
             <trix-editor input="x"></trix-editor>
             @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                    <label for="selectCategory">Category</label>
                    <select  class="form-control" name="category_id" id="selectCategory">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>
                @if (!$tags -> count()<= 0)
                <div class="form-group">
                    <label for="selectTag">Tag</label>
                    <select  class="form-control tags" name="tags[]" id="selecttag" multiple>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                       @if ($post ?? 'hasTag($tag->id)' )
                       selected
                       @endif>{{$tag->name}}</option>
                    @endforeach
                    </select>
                </div>
                @endif
            <div class="form-group">
             <label>Imag:</label>
             <input type="file" name="image" class="form-control">
             <!-- @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
            </div>
            <input  type="hidden" name="user_id"   value="{{Auth::user()->id}}">
            <div class="form-group">
                <button  class="btn btn-success">Add</button>
            </div>
            <!-- {{ isset($category) ? "Save" : "Add"}} -->
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.tags').select2();
});</script>
@endsection
