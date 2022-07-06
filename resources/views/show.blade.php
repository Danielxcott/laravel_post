@extends('master')
@section('title') {{ $post->title }} @stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="mb-0">Detail</h1>
                            </div>
                            <div>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Back to home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="text-black-50">{{ $post->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection