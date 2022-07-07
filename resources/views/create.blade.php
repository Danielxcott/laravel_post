@extends('master')
@section('title') Create @stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card my-5"> 
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="mb-0">Create a post</h1>
                            </div>
                            <div>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Back to Home</a>
                            </div>
                        </div>

                        {{-- @if ($errors->any())
                   <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ( $errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                   </div>
               @endif --}}
                   
               @if ($errors->any())
               @foreach ($errors->all() as $error )
                   
               @endforeach
               @endif

                        <form method="post" action="{{ route('post.store') }}">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control @error('title')
                                    is-invalid @enderror " value="{{ old('title') }}" name="title" id="title" >
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="describe">Description</label>
                                <textarea type="text" class="form-control @error('describe')
                                is-invalid @enderror" name="describe" id="describe" >{{ old('describe') }}</textarea>
                                @error('describe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection