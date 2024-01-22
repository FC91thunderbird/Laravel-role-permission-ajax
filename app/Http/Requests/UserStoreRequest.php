<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   function prepareForValidation(){
    $input = $this->all();

    if (isset($input['name'])) {
        $input['name'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $input['name']);
        $input['name'] = trim($input['name']);
    }

    if (isset($input['email'])) {
        $input['email'] = trim($input['email']);
    }

    $this->replace($input);
   }

    public function rules(): array
    {
        return [
            'name'=>'required|string|unique:users,name',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|string|min:6',
            'roleId'=> 'required|numeric',
            'image'=> 'image|mimes:jpeg,jpg,png,gif,svg|maz:2048',
        ];
    }
}
