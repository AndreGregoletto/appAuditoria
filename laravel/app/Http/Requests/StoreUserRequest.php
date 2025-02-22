<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
              'name'      => 'required|string|max:255'
            , 'email'     => 'required|email|unique:users,email'
            , 'username'  => 'required|string|unique:users,username|max:255'
            , 'cpf'       => 'required|cpf|unique:users,cpf'
            , 'cellphone' => 'required|string|regex:/^\(\d{2}\) \d{5}-\d{4}$/'
            , 'image'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            , 'password'  => 'required|string|min:8|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
              'name.required'      => 'O nome é obrigatório.'
            , 'email.required'     => 'O e-mail é obrigatório.'
            , 'email.email'        => 'O e-mail deve ser válido.'
            , 'email.unique'       => 'Este e-mail já está cadastrado.'
            , 'username.required'  => 'O login é obrigatório.'
            , 'username.unique'    => 'Este login já está em uso.'
            , 'cpf.required'       => 'O CPF é obrigatório.'
            , 'cpf.cpf'            => 'O CPF informado é inválido.'
            , 'cpf.unique'         => 'Este CPF já está cadastrado.'
            , 'cellphone.required' => 'O celular é obrigatório.'
            , 'cellphone.regex'    => 'O celular deve estar no formato (99) 99999-9999.'
            , 'image.image'        => 'O arquivo deve ser uma imagem.'
            , 'image.mimes'        => 'A imagem deve estar nos formatos: jpeg, png, jpg.'
            , 'image.max'          => 'O tamanho máximo da imagem é 2MB.'
            , 'password.required'  => 'A senha é obrigatória.'
            , 'password.min'       => 'A senha deve ter pelo menos 8 caracteres.'
            , 'password.confirmed' => 'As senhas não coincidem.'
        ];
    }
}

