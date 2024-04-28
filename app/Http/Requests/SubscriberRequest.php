<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
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
            'subscriber_arabic_name' => 'required|string',
            'subscriber_english_name' => 'required|string',
            'subscriber_reference' => 'required|numeric',
            'subscriber_type' => 'required|string',
            'identity_type' => 'required|string',
            'identity_number' => 'required|numeric',
            'arabic_address' => 'nullable',
            'english_address' => 'nullable',
            'about_subscriber_arabic' => 'nullable|string',
            'about_subscriber_english' => 'nullable|string',
            'subscriber_image' => 'nullable',
        ];
    }
}
