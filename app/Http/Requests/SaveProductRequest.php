<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
        return [
            'name' => 'required|string|min:3|max:256',
            'slug' => 'required|min:3|max:256|unique:products',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'max:'.(config('file.max_image_size') * 1024)],
            'category_id' => 'required|exists:\App\Models\Category,id',
            'description' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
