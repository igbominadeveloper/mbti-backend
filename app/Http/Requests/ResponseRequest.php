<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResponseRequest extends FormRequest
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
            'email' => 'required|email',
            'ei-1' => 'required|integer|min:1|max:7', 
            'ei-2' => 'required|integer|min:1|max:7', 
            'ei-3' => 'required|integer|min:1|max:7', 
            'sn-1' => 'required|integer|min:1|max:7', 
            'sn-2' => 'required|integer|min:1|max:7', 
            'tf-1' => 'required|integer|min:1|max:7', 
            'tf-2' => 'required|integer|min:1|max:7', 
            'jp-1' => 'required|integer|min:1|max:7', 
            'jp-2' => 'required|integer|min:1|max:7', 
            'jp-3' => 'required|integer|min:1|max:7', 
        ];
    }

    /**
     * Failed validation disable redirect
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
