<?php

namespace App\Http\Controllers;


use App\Models\post;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return posts view
        $post = Post::get();
        return view('posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  //sdssdsd
        $user_id = Auth::id();
        if ($user_id) {
            return view('posts.create');
        } else {
            return view('posts.alert');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post ->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show data
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user_id = Auth::id();
        if ($user_id) {
            $post = Post::find($id);
            return view('posts.edit', compact('post'));
        } else {
            return view('posts.alert');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update the value
        $post = Post::find($id);
        $post -> title = $request->title;
        $post ->description = $request->description;
        $post ->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //delete data id user is logged in
       $user_id = Auth::id();
       if ($user_id) {
           $post = Post::find($id);
           $post->delete();
           return redirect('/posts');
       } else {
           return view('posts.alert');
       }
    }
}
