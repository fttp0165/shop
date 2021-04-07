<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class APIRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(['errors'=>$validator->errors()],400));
    }

}
