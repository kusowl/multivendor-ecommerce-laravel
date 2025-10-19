<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|unique:categories',
            'slug' => 'required',
            'image' => ['nullable', 'image', 'max:'.(config('file.max_image_size') * 1024)],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(
            [
                'slug' => Str::slug($this->name),
            ]
        );
    }

    public function messages(): array
    {
        return [
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg).',
            'image.max' => 'The image may not be greater than '.config('file.max_image_size').'MB.',
        ];
    }
}
