@extends('master')
@section('title') Edit @stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card my-5"> 
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="mb-0">Edit a post</h1>
                            </div>
                            <div>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Back to Home</a>
                            </div>
                        </div>
                        <form method="post" action="{{ route('post.update',$post->id) }}">
                            @csrf
                            @method('put')
                            <div class="mb-2">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="title" >
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="describe">Description</label>
                                <textarea type="text" class="form-control" name="describe" id="describe" >{{ $post->description }}</textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection