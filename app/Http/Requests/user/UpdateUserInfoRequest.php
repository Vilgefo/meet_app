<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $userInfo = $this->route('user_info');

        if($this->user()->id !== $userInfo->user_id){
            return false;
        }
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
            "name" => 'nullable|string|max:40',
            "from" => 'nullable|string|max:40',
            "to" => 'nullable|string|max:40',
            "long" => 'nullable|string|max:40',
            "interestings" => 'nullable|array',
            "hobbies" => 'nullable|array',
            "about" => 'nullable|string|max:500',
            "img" => 'nullable|string',
            "socials" => 'nullable|array'
        ];
    }
}
