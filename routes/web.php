<?php

Auth::routes();

Route::get('/', 'FrontEndController@index')->name('home');

Route::get('/post/{slug}', 'FrontEndController@singlePost')->name('single.post');

Route::get('/category/{id}', 'FrontEndController@category')->name('single.category');

Route::get('/tag/{id}', 'FrontEndController@tag')->name('single.tag');

Route::post('/subscribe', function () {
    $email = request('email');

    Newsletter::subscribe($email);
    return redirect()->back();
});

// Route::post('/subscribe', 'MailChimpController@subscribe')->name('subscribe');

Route::get('/results', function () {
    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();

    return view('results')->with('posts', $posts)
        ->with('title', 'Search results: ' . request('query'))
        ->with('settings', \App\Setting::first())
        ->with('categories', \App\Category::take(5)->get())
        ->with('query', request('query'));
});

// Route for prefix { /admin }
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/login', 'HomeController@index')->name('dashboard.home');

    // Routes for posts
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::get('/posts', 'PostsController@index')->name('posts.show');
    Route::get('/posts/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::get('/posts/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/posts/trashed', 'PostsController@trashed')->name('post.deleted');
    Route::get('/posts/destroy/{id}', 'PostsController@fullDelete')->name('post.fullDelete');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('/posts/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/posts/update/{id}', 'PostsController@update')->name('post.update');

    // Routes for category
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/categories/index', 'CategoriesController@index')->name('category.show');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    // Routes for tags
    Route::get('/tags', 'TagController@index')->name('tag.show');
    Route::get('/tags/edit/{id}', 'TagController@edit')->name('tag.edit');
    Route::post('/tags/update/{id}', 'TagController@update')->name('tag.update');
    Route::get('/tags/delete/{id}', 'TagController@destroy')->name('tag.delete');
    Route::get('/tags/create', 'TagController@create')->name('tag.create');
    Route::post('/tags/create', 'TagController@store')->name('tag.store');

    // Routes for profile
    Route::get('/users', 'UsersController@index')->name('users')->middleware('admin');
    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::post('/user/create', 'UsersController@store')->name('user.store');
    Route::get('/user/admin/{id}', 'UsersController@admin')->name('user.admin');
    Route::get('/user/remove/admin/{id}', 'UsersController@not_admin')->name('admin.remove');
    Route::get('/user/remove/{id}', 'UsersController@destroy')->name('user.remove');
    Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');
    Route::post('/user/profile/update', 'ProfilesController@update')->name('profile.update');

    // Routes for settings
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.store');
});
