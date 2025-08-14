<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productrequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image_url' => 'required|url',
            'category' => 'required|string|max:255',
            'is_featured' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'price.required' => 'The product price is required.',
            'description.required' => 'The product description is required.',
            'image_url.required' => 'The product image URL is required.',
            'category.required' => 'The product category is required.',
            'is_featured.required' => 'The featured status is required.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'product name',
            'price' => 'product price',
            'description' => 'product description',
            'image_url' => 'product image URL',
            'category' => 'product category',
            'is_featured' => 'featured status',
        ];
    }

    public function prepareForValidation()
    {
        // You can modify the request data before validation if needed
        // $this->merge([
        //     'is_featured' => $this->is_featured ? true : false,
        // ]);
    }

    protected $stopOnFirstFailure = true;
}
