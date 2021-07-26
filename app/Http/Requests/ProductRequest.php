<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|integer|min:0',
        ];
    }
    public function messages()
    {
        return [

            'product_name.required' => __('messages.required'),
            'product_name.string' => __('messages.required'),
            'image.required' => __('messages.required'),
            'image.image' => __('messages.image'),
            'price.required' => __('messages.required'),
            'price.integer' => __('messages.integer'),

        ];
    }
}
