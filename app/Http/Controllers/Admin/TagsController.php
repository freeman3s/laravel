<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Repositories\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
	public function index(Tags $tags)
	{
		$tags = $tags->all();

		return view('admin.tags.index', compact('tags'));
	}

	public function create()
	{
		return view('admin.tags.create');
	}

	public function edit(Tag $tag)
	{
		return view('admin.tags.edit', compact('tag'));
	}

	public function store()
	{
		$this->validate(request(), [
			'name' => 'required|unique:tags'
		]);

		Tag::create([
			'name' => request('name')
		]);

		session()->flash('message', 'Tag has now been added.');

		return redirect('/admin/tags');
	}

	public function update(Tag $tag)
	{
		$this->validate(request(), [
			'name' => 'required|unique:tags'
		]);

		$tag = Tag::find($tag->id);
		$tag->name = request('name');
		$tag->save();

		session()->flash('message', 'Tag has now been updated.');

		return redirect('/admin/tags');
	}

	public function delete(Tag $tag)
	{
		$tag->forceDelete();

		session()->flash('message', 'Tag has now been deleted.');

		return redirect('/admin/tags');
	}
}
