<?php

namespace App\Repositories;

use App\Tag;

class Tags
{
	public function all()
	{
		return Tag::latest()
			->paginate(10);
	}
}