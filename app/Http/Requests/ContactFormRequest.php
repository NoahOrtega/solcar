<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        return [
            'name' => 'required|max: 255',
            'email' => 'required|email|max: 255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6|max: 20',
            'comment' => 'required|max: 5000',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'email' => '"Email" must be a valid email address',
            'phone' => '"Phone" must be a valid phone number',
            'comment' => 'Your message must be under 5000 characters',
        ];
    }

}
