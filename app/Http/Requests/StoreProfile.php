<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
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
          'is_nomad' => ['required', 'numeric'],
          'country' => ['required', 'string'],
          'occupation' => ['required', 'string'],
          'looking_for' => ['required', 'string'],
          'gender' => ['required', 'string'],
          'comment' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'ユーザーID',
            'is_nomad' => 'ノマド達成済か',
            'country' => '居住国/住んでみたい国',
            'occupation' => '職業',
            'looking_for' => '探している相手',
            'gender' => '性別',
            'comment' => '自己紹介',
        ];
    }
}
