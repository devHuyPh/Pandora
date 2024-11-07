<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'base_price' => 'required|numeric|min:0',
            'is_active' => ['nullable', Rule::in([0, 1])],
            'is_hotdeal' => ['nullable', Rule::in([0, 1])],
            'is_new' => ['nullable', Rule::in([0, 1])],
            'is_showhome' => ['nullable', Rule::in([0, 1])],
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'variants' => 'array',
            'variants.*.price' => 'required|numeric',
            'variants.*.stock' => 'required|integer',
            'variants.*.attribute_values' => 'required|array',
        ];
    }
}
