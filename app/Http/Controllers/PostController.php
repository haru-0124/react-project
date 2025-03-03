<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return Inertia::render("Post/Index",["posts" => $post->get()]);
    }
    
    public function show(Post $post)
    {
        return Inertia::render("Post/Show", ["post" => $post]);
    }

    public function create()
    {
        return Inertia::render("Post/Create");
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }
    public function edit(Post $post)
    {
        return Inertia::render("Post/Edit", ["post" => $post]);
    }
        
    public function update(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }
    public function delete(Post $post){
        $post->delete();
        return redirect("/posts");
    }
}
