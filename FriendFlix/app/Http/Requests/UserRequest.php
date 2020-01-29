<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
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
    protected function failedValidation(Validator $validator)
    {
        throw new  HttpResponseException(response()->json($validator->errors(),422));
    }
        

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        if ($this->isMethod('post')){
            return [
                'name' =>'required|string',
                'email' =>'required|email|unique:users',
                'password' => 'required|string',
                'phone_number' => 'required|string|celular',
                'num_amigos' => 'required|integer'
            ];
            }
        if ($this->isMethod('put')){
            return [
                'name' =>'required|string',
                'email' =>'required|email|unique:users',
                'password' => 'required|string',
                'phone_number' => 'required|string|celular',
                'num_amigos' => 'required|integer'
            ];
            }
    }

    public function messages(){
        return[
            'name.alpha'=>'o nome deve consistir apenas de caracteres alfabéticos.',
            'email.email'=>'o email deve estar no formato example@provider.com.',
            'email.unique'=>'o email ja esta sendo usado.'
        ];
    }
}