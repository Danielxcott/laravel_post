<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('index',compact('posts'));
    }
    public function postCreate(){
        return view('create');
    }
    //create
    public function store(Request $request){
        $title = $request->title;
        $describe = $request->describe;
        $post = new Post();
        $post->title = $title;
        $post->description = $describe;
        $post->save();

        return redirect()->route('post.index')->with('status','post created','success'); //back to index page
    }
    //detail
    public function show($id){
        $post = Post::find($id);
        return view('show',compact('post'));
    }
    //delete
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index');
    }
    //edit
    public function edit($id){
        $post = Post::find($id);
        return view('edit',compact('post'));
    }
    //update
    public function update(Request $request , $id){
        $post = Post::find($id);//database
        $post->title = $request->title;
        $post->description = $request->describe;
        $post->update();
        return redirect()->route('post.index');
    }
}
