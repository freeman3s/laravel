<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Repositories\Posts;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

	public function index(Posts $posts, Tag $tag = null)
	{
		$posts = $posts->all();
	
		return view('posts.index', compact('posts'));
	}

	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	}

	public function create()
	{
		$tags = Tag::pluck('name', 'id');
		$categories = Category::pluck('name', 'id');
		return view('posts.create', compact('tags', 'categories'));
	}

	public function store()
	{
		$this->validate(request(), [
			'title' => 'required',
			'slug' => 'required',
			'body' => 'required',
			'tags' => 'required',
			'category' => 'required'
		]);

		if (request()->hasFile('image')) {
			$image = request()->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('images/' . $filename);
			\Image::make($image)->resize(800, 400)->save($location);
		}

		$post = Post::create([
			'user_id' => auth()->id(),
			'title' => request('title'),
			'image' => $filename,
			'slug' => request('slug'),
			'body' => request('body')
		]);
		
		$post->tags()->sync(request('tags'), false);
		$category = Category::find(request('category'));
		$post->category()->associate($category);
		$post->save();

		session()->flash('message', 'Your post has now been published.');

		return redirect('/');
	}
}
