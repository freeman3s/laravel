<?php

namespace App\Http\Requests;

use App\Comment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateForm extends FormRequest
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
			'body' => 'required'
        ];
    }

    public function update($comment)
    {
		$comment = Comment::find($comment->id);
		$comment->body = request('body');
		$comment->save();
    }
}
