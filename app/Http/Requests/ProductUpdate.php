<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    function formValidate()
    {
        $input = $this->all();

        if (isset($input['title'])) {
            $input['title'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $input['title']);
            $input['title'] = trim($input['title']);
        }

        if (isset($input['description'])) {
            $input['description'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $input['description']);
            $input['description'] = trim($input['description']);
        }

        if (isset($input['sell_price'])) {
            $input['sell_price'] = preg_replace('/[^0-9\s]/', '', $input['sell_price']);
            $input['sell_price'] = trim($input['sell_price']);
        }
        if (isset($input['buy_price'])) {
            $input['buy_price'] = preg_replace('/[^0-9\s]/', '', $input['buy_price']);
            $input['buy_price'] = trim($input['buy_price']);
        }
        if (isset($input['sku'])) {
            $input['sku'] = preg_replace('/[^0-9\s]/', '', $input['sku']);
            $input['sku'] = trim($input['sku']);
        }

        return $this->replace($input);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:products,title,' . $this->route('product')->id,
            'description' => 'min:6|max:255',
            'sell_price' => 'required|numeric',
            'buy_price' => 'required|numeric',
            'sku' => 'required|numeric',
            'cat_id' => 'required|numeric',
            'sub_id' => 'required|numeric',
            'image'=> 'image|mimes:jpg,png,jpeg'
        ];
    }
}
