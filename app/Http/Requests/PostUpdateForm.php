<?php

namespace App\Http\Requests;

use App\Post;
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
			'body' => 'required'
        ];
    }

    public function update($post)
    {
		$post = Post::find($post->id);
		$post->title = request('title');
		$post->body = request('body');
		$post->save();
    }
}
