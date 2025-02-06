<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check(); // Ensure only authenticated users can submit the form
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $postId = $this->route('post'); // Get the post ID from the route (for updates)

        return [
            'title' => [
                'required',
                'min:3',
                "unique:posts,title,$postId", // String-based uniqueness rule
            ],
            'description' => 'required|min:10',
        ];
    }
}
