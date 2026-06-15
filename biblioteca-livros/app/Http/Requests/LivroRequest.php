<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $capaRule = $this->isMethod('POST')
            ? 'required|image|mimes:jpg,jpeg,png|max:2048'
            : 'nullable|image|mimes:jpg,jpeg,png|max:2048';

        return [
            'titulo'          => 'required|string|min:2|max:255',
            'autor'           => 'required|string|min:2|max:255',
            'editora'         => 'required|string|min:2|max:255',
            'paginas'         => 'required|integer|min:1',
            'genero'          => 'required|string|max:100',
            'ano_publicacao'  => 'required|integer|digits:4|min:1000|max:' . date('Y'),
            'sinopse'         => 'nullable|string',
            'capa'            => $capaRule,
        ];
    }

    public function messages(): array {
        return [
            'titulo.required'         => 'O título é obrigatório.',
            'titulo.min'              => 'O título deve ter pelo menos 2 caracteres.',
            'autor.required'          => 'O autor é obrigatório.',
            'editora.required'        => 'A editora é obrigatória.',
            'paginas.required'        => 'O número de páginas é obrigatório.',
            'paginas.integer'         => 'O número de páginas deve ser um número inteiro.',
            'genero.required'         => 'O gênero é obrigatório.',
            'ano_publicacao.required' => 'O ano de publicação é obrigatório.',
            'ano_publicacao.digits'   => 'O ano deve ter 4 dígitos.',
            'capa.required'           => 'A capa do livro é obrigatória.',
            'capa.image'              => 'O arquivo deve ser uma imagem.',
            'capa.mimes'              => 'A capa deve ser JPG, JPEG ou PNG.',
            'capa.max'                => 'A imagem não pode ter mais de 2MB.',
        ];
    }
}