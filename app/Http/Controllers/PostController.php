<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create',['users'=> $users]);
    }
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required'
        ]);
        Post::create($attrs);
        return redirect()->route('post.index');
    }
    public function edit($id)
    {
        return view('posts.edit',[
            'post' => Post::findOrFail($id),
            'users' => User::all()
        ]);
    }
    public function update(Request $request,$id)
    {
        $attrs = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required'
        ]);
        Post::findOrFail($id)->update($attrs);
        return redirect()->route('post.index');
    }
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->back();
    }
}
