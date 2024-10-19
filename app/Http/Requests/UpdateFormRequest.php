<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
        // Ensure to return an empty array for GET requests
        if ($this->isMethod('get')) {
            return [];
        }
        $id = $this->input('id');
        // Validation rules for POST requests
        return [
            'username' => 'required',
            'mail' => 'required|email|unique:users,mail,'.$id.',id',
            'password' => 'required|same:password_confirmation'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '名前は必ず登録してください。',
            'mail.required' => 'メールアドレスは必ず登録してください。',
            'mail.email' => 'メールの形式で登録してください。',
            'mail.unique' => '登録済のメールアドレスです。',
            'password.same' => 'パスワードは確認用と同じ値を入力してください。',
        ];
    }
}
