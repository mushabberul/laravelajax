<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidationUserRequest extends FormRequest
{

 /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
        ]),200);
    }




    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $rules = USER::VALIDATION_RULES;
        if(request()->update_id){
            $rules['email'][2] = ['email','unique:users,email'.request()->update_id];
            $rules['mobile_no'][3] = ['mobile_no','unique:users,email'.request()->update_id];
        }
        return $rules;

    }
}
