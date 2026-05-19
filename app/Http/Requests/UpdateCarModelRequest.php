<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarModelRequest extends FormRequest
{
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => 'required|exists:t_car_brand,id',
            'name' => 'required|string|min:3',
            'model_year' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'transmission' => 'required|in:manual,matic',
            'is_tutor_car' => 'required|boolean',
            
        ];
    }
}
