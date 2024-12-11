<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
            'title' => 'required|string|min:4|max:255',
            'location' => 'required|string|max:255',
            'requirements' => 'required|string',
            'remote' => 'required|boolean',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_email' => 'required|email|max:255',
            'job_type' => 'required|in:Full Time,Part time,Contract,Internship',
            'category' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'salary' => 'required|integer|min:0',
        ];
    }
}
