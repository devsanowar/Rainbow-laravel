<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'brand_id' => 'nullable|exists:brands,id',

            'product_name' => 'required|string|max:255',
            'product_slug' => 'nullable|string|max:255|unique:products,product_slug',
            'sku' => 'nullable|string|max:100',
            'short_description' => 'nullable|string|max:1000',
            'long_description' => 'nullable|string',

            'regular_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:regular_price',
            'discount_type' => 'nullable|in:flat,percent',

            'stock_quantity' => 'required|integer|min:0',
            'points' => 'required|numeric|min:0',
            // 'in_stock' => 'required|boolean',

            // 'colors' => 'nullable|array',
            // 'colors.*' => 'string|max:20',
            // 'sizes' => 'nullable|array',
            // 'sizes.*' => 'string|max:10',

            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:200',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:1024',

            'is_featured' => 'required|boolean',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',

            'subcategory_id.exists' => 'The selected sub-category is invalid.',
            'brand_id.exists' => 'The selected brand is invalid.',

            'product_name.required' => 'Product name is required.',
            'product_name.max' => 'Product name may not be greater than 255 characters.',

            'product_slug.max' => 'Slug may not be greater than 255 characters.',
            'product_slug.unique' => 'This slug is already taken.',

            'sku.max' => 'SKU may not be greater than 100 characters.',

            'short_description.max' => 'Short description must be less than 1000 characters.',
            'long_description.string' => 'Long description must be text.',

            'regular_price.required' => 'Regular price is required.',
            'regular_price.numeric' => 'Regular price must be a number.',
            'regular_price.min' => 'Regular price cannot be negative.',

            'discount_price.numeric' => 'Discount price must be a number.',
            'discount_price.min' => 'Discount price cannot be negative.',
            'discount_price.lt' => 'Discount price must be less than regular price.',

            'discount_type.in' => 'Discount type must be flat or percent.',

            'stock_quantity.required' => 'Stock quantity is required.',
            'stock_quantity.integer' => 'Stock quantity must be an integer.',
            'stock_quantity.min' => 'Stock quantity must be at least 0.',

            'points.required' => 'Points field is required.',
            'points.numeric' => 'Points must be a number.',
            'points.min' => 'Points must be at least 0.',

            'thumbnail.image' => 'Thumbnail must be an image.',
            'thumbnail.mimes' => 'Thumbnail must be a jpeg, png, jpg, gif, or webp image.',
            'thumbnail.max' => 'Thumbnail image must not exceed 200KB.',

            'images.array' => 'Images must be an array.',
            'images.*.image' => 'Each image must be a valid image file.',
            'images.*.mimes' => 'Each image must be a jpeg, png, jpg, gif, or webp.',
            'images.*.max' => 'Each image must not exceed 1MB.',

            'is_featured.required' => 'Please select whether the product is featured.',
            'is_featured.boolean' => 'Featured field must be true or false.',

            'is_active.required' => 'Please select the product status.',
            'is_active.boolean' => 'Status must be true or false.',
        ];
    }
}
