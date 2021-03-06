<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            "name" => "required|min:3",
            "description" => "required|min:3",
            "sale_price" => "required|numeric",
            "purchase_price" => "required|numeric",
            "category_id" => "required|numeric",
            "user_id" => "nullable|numeric",
            "tax" => "nullable|numeric",
            "image" => "nullable|image",
        ];
    }
}
