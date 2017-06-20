<?php

namespace App\Http\Requests;

use App\Post;
use Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required',
			'body' => 'required'
        ];
    }

    public function update($post)
    {
    	$post = Post::find($post->id);
		$post->title = request('title');
		
		if (request()->hasFile('image')) {
			$image = request()->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('images/' . $filename);
			Image::make($image)->resize(800, 400)->save($location);
			$post->image = $filename;
		}

		$post->slug = request('slug');
		$post->body = request('body');
		$post->save();
    }
}
