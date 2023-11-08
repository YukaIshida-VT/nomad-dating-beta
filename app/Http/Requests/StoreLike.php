<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLike extends FormRequest
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
          'liking_user_id' => ['required', 'numeric'],
          'liked_user_id' => ['required', 'numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'liking_user_id' => 'いいねしたユーザーID',
            'liked_user_id' => 'いいねされたユーザーID',
        ];
    }
}
