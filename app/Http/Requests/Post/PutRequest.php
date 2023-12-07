<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Post $post): array
    {
        return [
            'title'       => 'required|min:5|max:500', 
            'slug'        => 'required|unique:posts,slug,'. $this->route('post')->id,
            'content'     => 'required|min:5|max:500',
            'category_id' => 'required|integer', 
            'description' => 'required|min:5|max:500' ,
            'posted'      => 'required',
            'image'       => 'mimes:jpeg,jpg,png|max:10240'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
}
