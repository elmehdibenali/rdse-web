<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email,' . optional($this->route('user'))->id,
        'password' => 'nullable|string|min:8|confirmed',
        // 'photo' => 'nullable|image'
        'photo' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:2048',
        'role' => 'nullable|string'
        ];

    if ($this->route()->getActionMethod() === 'store') {
          $rules['password'] = 'required|string|min:8|confirmed';

       }

    return $rules;
    }
}
