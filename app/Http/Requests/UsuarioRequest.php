<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nome'            => 'required|max:255|min:10',
            'data_nascimento' => 'required|date',
            'biografia'       => 'required|max:500',
            'rua'             => 'required|max:50',
            'bairro'          => 'required',
            'estado'          => 'required',
            'cidade'          => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'   => 'O nome completo é obrigatório!',
            'nome.max'        => 'O nome deve ter no máximo 255 caracteres',
            'nome.min'        => 'O nome deveter no mínimo 10 caracteres',
            'data_nascimento.required' => 'A data de nascimento é obrigatória!',
            'data_nascimento.date'     => 'O campo data deve ter uma data válida!',
            'biografia.required' => 'O campo biografia é obrigatório!',
            'biografia.max'      => 'A biografia deve ter no máximo 500 caracteres',
            'rua.required' => 'O campo logradouro é obrigatório!',
            'rua.max'      => 'O campo logradouro deve conter no máximo 50 caracteres',
            'bairro.required' => 'O campo bairro é obrigatório!',
            'estado.required' => 'O campo estado é obrigatório!',
            'cidade.required' => 'O campo cidade é obrigatório!',
        ];
    }
}
