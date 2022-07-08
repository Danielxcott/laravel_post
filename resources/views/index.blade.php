@extends('master')
@section('title') Home @stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="card my-5">
                    <div class="card-body">
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="mb-0">Hello</h1>
                                <p class="text-black-50 mb-0">What's on your mind?</p>
                            </div>
                            
                            <div>
                                <a href="{{ route('post.create') }}" class="btn btn-primary">Create a post</a>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="mb-4">
                @if(session('status'))
                <span class="alert alert-success d-block">{{ session('status') }}</span>
                @endif
               </div>
               <div>
                <form action="{{ route('post.index') }}" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search a post" value="{{ old('keyword',request('keyword')) }}" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                      </div>
                </form>
            </div>
                @foreach ( $posts as $post )
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="text-black-50">{{ Str::words($post->description, 50 , '...') }}</p>
                        <div class="d-flex justify-content-between">
                            <p>{{ $post->created_at->format("d M Y | m : i a") }}</p>
                            <div>
                                <form class="d-inline-block" action="{{ route('post.destroy',$post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Del</button>
                                </form>
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-info">edit</a>
                                <a href="{{ route('post.show',$post->id) }}" class="btn btn-primary">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="">
                    {{-- {{ $posts->appends(request()->query())->links() }}  keyword and search page url --}}
                    {{ $posts->links() }} 
                </div>
            </div>
        </div>
    </div>
@endsection