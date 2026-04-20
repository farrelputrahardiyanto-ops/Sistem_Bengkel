<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSparepartsRequest extends FormRequest
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
            'name' => 'required|min:3',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand_spareparts' => 'required|string',
            'brand_car' => 'required|string',
            'car_type' => 'required|string',
            'part_code' => 'required|string|unique:t_spareparts,part_code',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
        ];
    }
}
