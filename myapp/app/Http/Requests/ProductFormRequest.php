<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
    $rules = [
        'category_id' => ['required', 'integer'],
        'name' => ['required', 'string'],
        'slug' => ['required', 'string', 'max:255'],
        'brand' => ['required', 'string', 'max:255'],
        'small_description' => ['required', 'string'],
        'description' => ['required', 'string'],

        'original_price' => ['required', 'integer', 'min:0'],
        'selling_price' => ['required', 'integer', 'min:0'],
        'quantity' => ['required', 'integer', 'min:0'],

        'meta_title' => ['required', 'string', 'max:255'],
        'meta_keyword' => ['required', 'string'],
        'meta_description' => ['required', 'string'],
    ];

    if ($this->isMethod('post')) {

        $rules['images'] = ['required', 'array'];
        $rules['images.*'] = ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];
    } else {

        $rules['images'] = ['nullable', 'array'];
        $rules['images.*'] = ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];
    }

    return $rules;
}
}
