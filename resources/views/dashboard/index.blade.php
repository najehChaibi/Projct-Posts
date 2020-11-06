@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                   <div class="card ">
                      <div class="card-header text-center">Users </div>
                      <div class="card-body text-center">{{ $users_count }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="card ">
                      <div class="card-header text-center">Categories </div>
                      <div class="card-body text-center">{{ $categories_count }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="card ">
                      <div class="card-header text-center">Postes </div>
                      <div class="card-body text-center">{{ $posts_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
