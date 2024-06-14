<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DeanStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'dean_fullname' => ['required', 'string', 'max:255', 'unique:deans,dean_fullname'],
            'dean_status' => ['required', 'string', 'max:255'],
        ];

        // If department_id is selected, apply the validation rules for existing departments
        if ($this->input('department_id')) {
            $rules['department_id'] = ['required', 'exists:departments,id', 'unique:deans,department_id'];
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
            'dean_fullname.unique' => 'The name has already been registered.',
            'department_id.unique' => 'The department name is already assigned to someone.',
        ];
    }
}
