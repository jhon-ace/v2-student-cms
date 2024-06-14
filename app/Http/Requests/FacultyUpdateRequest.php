<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FacultyUpdateRequest extends FormRequest
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
            'faculty_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'faculty_fullname' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('faculty', 'faculty_fullname')->ignore($this->route('faculty'), 'id'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('faculty', 'email')->ignore($this->route('faculty'), 'id'),
            ],
            'password' => 'nullable|string|min:8',
            'department_id' => 'required|exists:departments,id',
            'status' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'faculty_photo.image' => 'The photo must be an image file.',
            'faculty_photo.max' => 'The photo may not be greater than 2MB.',
            'faculty_fullname.required' => 'The faculty name is required.',
            'faculty_fullname.max' => 'The faculty name may not be greater than :max characters.',
            'faculty_fullname.unique' => 'The faculty name has already been taken.',
            'email.required' => 'The faculty email is required.',
            'email.email' => 'The faculty email must be a valid email address.',
            'email.unique' => 'The faculty email has already been taken.',
            'password.required' => 'The faculty password is required.',
            'password.min' => 'The faculty password must be at least :min characters.',
            'department_id.required' => 'Please select a department for the faculty.',
            'department_id.exists' => 'The selected department is invalid.',
            'status.required' => 'The faculty status is required.',
        ];
    }
}
