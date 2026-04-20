<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'profile_picture' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:3',
            'no_whatsapp' => 'required|unique:t_users,no_whatsapp,' . $this->route('user'),
            'email' => 'required|email|unique:t_users,email,' . $this->route('user'),
            'password' => 'nullable|min:5|confirmed'
        ];
    }
}
