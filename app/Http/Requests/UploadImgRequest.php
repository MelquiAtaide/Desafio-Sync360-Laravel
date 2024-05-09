<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImgRequest extends FormRequest
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
            'img_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'img_perfil.required' => 'O campo de imagem é obrigatório.',
            'img_perfil.image' => 'O arquivo deve ser uma imagem.',
            'img_perfil.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'img_perfil.max' => 'O tamanho máximo da imagem é de 2MB.',
        ];
    }
}
