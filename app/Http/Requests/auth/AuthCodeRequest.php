<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthCodeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|string|exists:users,email',
            'code' => 'numeric|min:0000|max:9999'
        ];
    }
}
