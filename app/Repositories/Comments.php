<?php

namespace App\Repositories;

use App\Comment;

class Comments
{
	public function all()
	{
		return Comment::latest()->get();
	}
}