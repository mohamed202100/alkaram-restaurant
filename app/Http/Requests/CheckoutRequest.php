<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|min:3|max:255|regex:/^[\pL\s]+$/u',
            'customer_phone' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
            'address' => 'required|string|min:10|max:500',
            'notes' => 'nullable|string|max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'الاسم مطلوب.',
            'customer_name.min' => 'الاسم يجب أن يتكون من 3 أحرف على الأقل.',
            'customer_name.max' => 'الاسم لا يجب أن يتجاوز 255 حرف.',
            'customer_name.regex' => 'الاسم يجب أن يحتوي على حروف فقط.',
            'customer_phone.required' => 'رقم الجوال مطلوب.',
            'customer_phone.regex' => 'رقم الجوال غير صحيح. يجب أن يكون رقماً سعودياً صالحاً (مثال: 05XXXXXXXX).',
            'address.required' => 'العنوان مطلوب.',
            'address.min' => 'العنوان يجب أن يكون مفصلاً (10 أحرف على الأقل).',
            'address.max' => 'العنوان لا يجب أن يتجاوز 500 حرف.',
            'notes.max' => 'الملاحظات لا يجب أن تتجاوز 1000 حرف.',
        ];
    }
}
