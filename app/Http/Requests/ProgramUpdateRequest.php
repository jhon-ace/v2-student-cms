<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramUpdateRequest extends FormRequest
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
        return [
            'program_abbreviation' => ['required','string','max:255'],
            'program_description' => ['required', 
            'string', 
            'max:255', 
            Rule::unique('programs', 'program_description')->ignore($this->program->id)],
            'status' => ['required', 'string', 'max:255'],
            'department_id' => ['sometimes', 'required', 'exists:departments,id'],

        ];
    }

    public function messages(): array
    {
        return [
            'program_description.unique' => 'The program has already been registered.',
        ];
    }

    
}
