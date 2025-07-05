<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
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
            'user_id' => 'nullable|exists:users,id',
            'service_id' => 'nullable|exists:services,id',
            'status' => 'nullable|in:pending,confirmed,canceled,in_progress,finished',
            'proposed_datetime' => 'nullable|date|after_or_equal:now',
            'user_response' => 'nullable|in:no_response,accepted,rejected',
            'consultation_link' => 'nullable|url',
            'retried_from_id' => 'nullable|exists:consultations,id',
        ];
        if ($this->route()->getActionMethod() === 'store') {
          $rules['service_id'] = 'required|exists:services,id';

       }
        return $rules;
    }
}
