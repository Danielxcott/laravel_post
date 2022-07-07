<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $title = $request->title;
        // $describe = $request->describe;
        // $posts = new Post();
        // $posts->title = $title;
        // $posts->description = $describe;
        // $posts->save();
        $request->validate([
            "title" => 'bail|required|unique:posts,title|min:10',
            "describe" => 'required|min:10',
        ]);
        Post::create([ //use protected $fillable =['title','description'] at app/model/post
            "title" => $request->title,
            "description" => $request->describe,
        ]);

        return redirect()->route('post.index')->with('status',"post created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findorfail($id);
        return view('show',compact('post'));
    }
    // public function show(Post $post){
    //     return $post
    // } when you use php artisan make:controller BlogController --model=Blog -r that function will be shown at here and you don't need to give parameter to find $id. Just use return and give the following parenthese as a parameter
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findorfail($id); 
        $request->validate([
            "title" => 'required|unique:posts,title|min:10',
            "describe" => 'required|min:10',
        ]);
        $post->title = $request->title;
        $post->description = $request->describe;
        $post->update();
        return redirect()->route('post.index')->with('status',"post updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findorfail($id);
        $posts->delete();
        return redirect()->route('post.index');
    }
}
