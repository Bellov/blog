<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->simplePaginate(5);
        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $tags = Tag::all();

        $categories = Category::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:5',
            'featured' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|min:10',
            'category_id' => 'required',
        ]);

        $featured = $request->featured;

        $featured_new_name = time() . $featured->getClientOriginalName();

        $featured->move('uploads/images/', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/images/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id(),
        ]);

        $post->tags()->attach($request->tags);

        return back()->with('success', 'The post created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured')) {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/images', $featured_new_name);

            $post->featured = 'uploads/images/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        return back()->with('success', 'The post was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return back()->with('danger', 'The post was trashed successfully!');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', compact('posts'));
    }

    public function fullDelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        return back()->with('danger', 'The post was deleted successfully!');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        return back()->with('success', 'The post was restore successfully!');
    }
}
