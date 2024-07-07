<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function productAllowedInputs(): array
    {
        return $this->only([
            'id' => 'productId',
            'name' => 'productName',
            'color' => 'productColor',
            'size' => 'productSize',
            'price' => 'productPrice'
        ]);
    }
}
