<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeValueRequest extends FormRequest
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
            'attribute_value' => 'required|string|min:3',
            'icon' => 'required|string',
        ];
    }
    public function messages()
    {
        return [

            'attribute_value.required' => __('messages.required'),
            'attribute_value.min' => __('messages.min'),
            'icon.required' => __('messages.required'),
        ];
    }
}
