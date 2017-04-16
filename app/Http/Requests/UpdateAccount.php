<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateAccount extends FormRequest
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
            'avatar_id' => Rule::exists('images', 'id')->where(function ($q) {
              $q->where('user_id', Auth::user()->id);
            }),
        ];
    }

    // public function messages()
    // {
    //     return [
    //       'avatar_id.exists' => 'A image with such id does not exist'
    //     ];
    // }
}
