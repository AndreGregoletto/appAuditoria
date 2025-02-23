<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $auth = $this->route('user') == auth()->user()->id ? true : false;
        
        return $auth;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user'); 
        
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users,email,' . $userId],
            'cellphone' => ['required', 'string', 'regex:/^\(\d{2}\) \d{5}-\d{4}$/'],
        ];
    }

    /**
     * Get custom error messages for validation.
     */
    public function messages(): array
    {
        return [
              'name.required'   => 'O nome é obrigatório.'
            , 'email.required'  => 'O e-mail é obrigatório.'
            , 'email.unique'    => 'Este e-mail já está em uso.'
            , 'numero.required' => 'O número é obrigatório.'
            , 'numero.unique'   => 'Este número já está em uso.',
        ];
    }
}
