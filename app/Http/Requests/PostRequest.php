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
            'title' => 'required | max:15', //タイトルは15文字以内で必須
            'body' => 'required', //内容は必須
            // 'image' => 'required | file | image'
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'タイトルは必須です。',
        'title.max'      => 'タイトルは15文字以内で入力してください。',
        'body.required'  => '内容は必須です。',
        // 'image.mimes'    => 'ファイルタイプをjpeg,jpg,png,gifに設定してください。',
        // 'image.max'      => 'ファイルサイズを10MB以下に設定してください。',
       
    ];

}

}
