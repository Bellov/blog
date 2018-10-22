<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *x`
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home')
            ->with('posts_count', Post::all()->count())
            ->with('trash_posts_count', Post::onlyTrashed()->get()->count())
            ->with('users_count', User::all()->count())
            ->with('categories_count', Category::all()->count());
    }
}
