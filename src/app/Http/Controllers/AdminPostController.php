<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;


class AdminPostController extends Controller
{
    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'featured_image' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $path = request()->file('featured_image')->store('thumbnails');

        $attributes['author_id'] = auth()->id();
        $attributes['status_id'] = 2;
        $attributes['featured_image'] = URL::to('/storage') . '/' . $path;
        $attributes['published_at'] = date("Y-m-d h:i:s");

        Post::create($attributes);

        return redirect('/')->with('success', 'Post created!');
    }

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest('published_at')->paginate(50)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'featured_image' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if (isset($attributes['featured_image'])) {
            $path = request()->file('featured_image')->store('thumbnails');
            $attributes['featured_image'] = URL::to('/storage') . '/' . $path;
        }

        $attributes['updated_at'] = date("Y-m-d h:i:s");

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted!');
    }
}
