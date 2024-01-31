<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    function formValidate(){
        $input = $this->all();

        if(isset($input['name'])){
            $input['name'] = preg_replace("/[^a-zA-Z\s]/","", $input['name']);
            $input['name'] = trim($input['name']); 
        }

        return $this->replace($input);
    }

    public function rules(): array
    {
        return [
            'name'=> 'required|unique:categories,name',
            'image'=> 'required|image|mimes:jpeg,png,jpg,svg'
        ];
    }
}
