<?php

namespace App\Http\Requests;
use App\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
             'players' =>'required|max:50',
             'title' => 'required|max:50',
             'body' => 'required|max:500',
        ];
    }


}
