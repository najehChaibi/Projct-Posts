@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="card card-default">
    <div class="card-header">
     Update Profil
    </div>
    <div class="card-body">
        <form  action="{{ route('users.update', $user->id)}}" method="POST"  enctype='multipart/form-data' >
        @csrf     
           <div class="form-group">
             <label> Name:</label>
             <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror"  value="{{ $user->name}}" placeholder="Add Title">
             @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
             <label> Email:</label>
             <input type="text" name="email" class="form-control" class="@error('email') is-invalid @enderror"  value="{{ $user->email }}" placeholder="Add Descrition">
             @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
             <label> About:</label>
             <input type="text" name="about" class="form-control" class="@error('about') is-invalid @enderror"   value="{{$profil->about}}">
             @error('about')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
             <label> Facebook:</label>
             <input type="text" name="facebook" class="form-control" class="@error('facebook') is-invalid @enderror"   value="{{$profil->facebook}}">
             @error('facebook')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
             <label> Twitter:</label>
             <input type="text" name="tiwtter" class="form-control" class="@error('tiwtter') is-invalid @enderror"   value="{{$profil->tiwtter}}">
             @error('tiwtter')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            
            <div class="form-group">
                <button  class="btn btn-success">Update</button>
            </div>
           
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
