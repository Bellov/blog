<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('title', Setting::first()->site_name)
            ->with('categories', Category::take(6)->get())
            ->with('first_post', Post::orderBy('updated_at', 'DESC')->first())
            ->with('second_post', Post::orderBy('updated_at', 'DESC')->skip(1)->take(1)->get()->first())
            ->with('third_post', Post::orderBy('updated_at', 'DESC')->skip(2)->take(1)->get()->first())
            ->with('windows', Category::find(1))
            ->with('development', Category::find(4))
            ->with('macos', Category::find(3))
            ->with('settings', Setting::first());
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $next_post = Post::where('id', '>', $post->id)->min('id');
        $prev_post = Post::where('id', '<', $post->id)->max('id');

        return view('single')
            ->with('post', $post)
            ->with('title', $post->title)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->get())
            ->with('next', Post::find($next_post))
            ->with('prev', Post::find($prev_post))
            ->with('tags', Tag::all());
    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('category')
            ->with('category', $category)
            ->with('title', $category->name)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->get());
    }

    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('tag', $tag)
            ->with('title', $tag->tag)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->get());
    }
}
