<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = Auth::check() && Auth::user()->user_type === 'admin';
        if($user){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $rules = [
            'course_code' => ['required', 'string', 'max:255', 'unique:courses,course_code'],
            'course_name' => ['required', 'string', 'max:255'],
            'course_description' => ['required', 'string', 'max:255'],
            'course_semester' => ['required', 'string', 'max:255'],
        ];

        if ($this->input('program_id')) {
            $rules['program_id'] = ['required', 'exists:programs,id'];
        }

        return $rules;
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'course_code.unique' => 'The course code has already been registered.',
            // 'program_id.unique' => 'The department name is already assigned to someone.',
        ];
    }
}
