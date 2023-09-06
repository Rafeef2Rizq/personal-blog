<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:30'],
            'excerpt' => ['required', 'max:100'],
            'image' => ['image', 'max:2048'], 
            'content' => ['nullable', 'string'] ,
            'status'=>[Rule::in(['draft','published','scheduled']),]
        ];
    }
}
