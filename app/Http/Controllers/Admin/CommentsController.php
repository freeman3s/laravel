<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Requests\CommentUpdateForm;
use App\Repositories\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
	public function index(Comment $comments)
	{
		$comments = $comments->all();

		return view('admin.comments.index', compact('comments'));
	}

	public function edit(Comment $comment)
	{
		return view('admin.comments.edit', compact('comment'));
	}

	public function store(Comment $comment, CommentUpdateForm $form)
	{
		$form->update($comment);

		session()->flash('message', 'Comment has now been updated.');

		return redirect('/admin/comments');
	}

	public function delete(Comment $comment)
	{
		$comment->forceDelete();

		session()->flash('message', 'Comment has now been deleted.');

		return redirect('/admin/comments');
	}
}
