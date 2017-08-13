<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            'firstname' => 'required|max:10|string',
            'lastname' => 'required|max:10|string',
            'kana' => 'required|max:20|string',
            'sex' => 'required|boolean',
            'birthday' => 'required|date',
            'tel.*' => 'required|digits_between:2,4|max:10',
            'contents' => 'required|string',
            'main-photo' => 'file|image',
            'sub-photo' => 'file|image',
        ];
    }
}
