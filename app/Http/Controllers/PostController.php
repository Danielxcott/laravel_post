<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::paginate(5);
        // $posts = Post::where("id",'<',5)->orderByRaw('id DESC')->get();
        // $posts = Post::where("id",5)->first()->description;
        // $posts = Post::orWhere('id',5)->orWhere('title','abdx')->dd();
        // $posts = Post::whereBetween('id',[7,20])->orderBy("id","desc")->get();
        // $posts = Post::whereBetween('id',[7,20])->latest('id')->get();
        // $keyword = request('keyword');
        // $posts = Post::where("title","like","%$keyword%")->get();
            // $posts = Post::when(request('keyword'),function($q){
                        // $keyword = request("keyword");
            //     $q->where('title','like',"%$keyword%")
            //     ->orWhere('description','like',"%$keyword%");
            // })->get();
            // $posts = Post::where("id","<",10)->get()->map(function($post){
            //     $post->title = strtoupper($post->title);
            //     return $post;
            // });
            // $posts = Post::paginate(10)->through(function($post){
            //     $post->title = strtoupper($post->title);
            //     return $post;
            // });
        // return dd($posts);
        // return $posts;
        return view('index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        Post::create([ //use protected $fillable =['title','description'] at app/model/post
            "title" => $request->title,
            "description" => $request->describe,
        ]);
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->describe;
        // $post->save();

        return redirect()->route('post.index')->with('status',"post created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->description = $request->describe;
        $post->update();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
       return redirect()->route('post.index');
    }
}
