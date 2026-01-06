<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:1',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'القسم مطلوب.',
            'category_id.exists' => 'القسم المحدد غير موجود.',
            'name.required' => 'اسم الطبق مطلوب.',
            'name.max' => 'اسم الطبق لا يجب أن يتجاوز 255 حرف.',
            'price.required' => 'السعر مطلوب.',
            'price.numeric' => 'السعر يجب أن يكون رقماً.',
            'price.min' => 'السعر يجب أن يكون موجباً.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت.',
        ];
    }
}
