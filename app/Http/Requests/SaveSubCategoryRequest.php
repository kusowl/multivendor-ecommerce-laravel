<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SaveSubCategoryRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:256'],
            'category_id' => 'required|integer|exists:App\Models\Category,id',
            'slug' => ['required'],
        ];

        /*
         * Apply unique rule within whole existing table, only when new Sub-Category is created.
         * Else check uniqueness within whole existing table except the current record.
         * This makes unique rule pass for when record is updated with same name as before.
         * */
        if ($this->method() === 'PATCH') {
            $rules['name'][] = Rule::unique('sub_categories', 'name')->ignore($this->route('subCategory'));
            $rules['slug'][] = Rule::unique('sub_categories', 'name')->ignore($this->route('subCategory'));
        } else {
            $rules['name'][] = Rule::unique('sub_categories', 'name');
            $rules['slug'][] = Rule::unique('sub_categories', 'name');
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Parent category is required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
