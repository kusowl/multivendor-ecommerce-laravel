<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SaveProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // user should be vendor
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
            'name' => ['required', 'string', 'min:3', 'max:256'],
            'slug' => ['required', 'min:3', 'max:256'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'max:'.(config('file.max_image_size') * 1024)],
            'category_id' => ['required', 'exists:\App\Models\Category,id'],
            'description' => ['required'],
        ];

        if ($this->method() === 'PATCH') {
            $rules['slug'][] = Rule::unique('products')->ignore($this->route('product'));
        } else {
            $rules['slug'] = Rule::unique('products');
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
