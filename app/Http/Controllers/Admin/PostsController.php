<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Repositories\Posts;
use App\Http\Requests\PostUpdateForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
	public function index(Posts $posts)
	{
		$posts = $posts->all();

		return view('admin.posts.index', compact('posts'));
	}

	public function edit(Post $post)
	{
		return view('admin.posts.edit', compact('post'));
	}

	public function store(Post $post, PostUpdateForm $form)
	{
		$form->update($post);

		session()->flash('message', 'Your post has now been updated.');

		return redirect('/admin/posts');
	}

	public function delete(Post $post)
	{
		$post->forceDelete();

		session()->flash('message', 'Your post has now been deleted.');

		return redirect('/admin/posts');
	}
}
