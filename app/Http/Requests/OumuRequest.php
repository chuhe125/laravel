<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class OumuRequest extends FormRequest
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
            //
'student_id' => 'required',
        'a1' => 'required',
        'a2' => 'required',
        'a3' => 'required',
        'b1' => 'required',
        'b2' => 'required',
        'b3' => 'required',
        'b4' => 'required',
        'b5' => 'required',
        'b6' => 'required',
        'b7' => 'required',
        'b8' => 'required',
        'b9' => 'required',
        'b10' => 'required',
        'b11' => 'required',
        'b12' => 'required',
        'b13' => 'required',
        'b14' => 'required',
        'pd1' => 'required',
        'pd2' => 'required',
        'pd3' => 'required',
    ];
}
protected function failedValidation(Validator $validator){

    throw(new HttpResponseException(json_fail('参数错误',$validator->errors()->all(),422)));
}
}
