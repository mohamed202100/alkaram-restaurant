<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'معرّف الطبق مطلوب.',
            'id.exists' => 'الطبق المحدد غير موجود.',
            'quantity.required' => 'الكمية مطلوبة.',
            'quantity.integer' => 'الكمية يجب أن تكون رقماً صحيحاً.',
            'quantity.min' => 'الكمية يجب أن تكون 1 على الأقل.',
            'quantity.max' => 'الكمية لا يجب أن تتجاوز 50.',
        ];
    }
}
