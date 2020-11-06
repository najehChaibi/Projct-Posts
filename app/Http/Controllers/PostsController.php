<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('checkCategory')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // $id = Auth::user()->id;
        // dd($request->all());
       $post  =  Post::create([
            'title' => $request-> title,
            'description' => $request-> description,
            'content' => $request-> content,
            'category_id'=> $request-> category_id,
            'image'=> $request->image->store('images', 'public'),
            'user_id' => $request-> user_id
        ]);
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
         
        session()->flash('success', 'Post Created Successfully');
        return redirect (route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post)->with('categories',  Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create', ['post' => $post, 'categories' => Category::all(), 'tags'=> tag::all()]);
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
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post->delete();
        

        $post = Post::withTrashed()->where('id', $id)->first();
          if($post->trashed()){
              $post->forceDelete();
              Storage::disk('public')->delete($post->image);
          } else{
              $post->delete();
          }
        session()->flash('success', 'Post Trashed Successfully');
        return redirect (route('posts.index'));


    }

    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }
}
