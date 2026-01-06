<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required',
            'guests' => 'required|integer|min:1|max:20',
            'notes' => 'nullable|string|max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب.',
            'name.max' => 'الاسم لا يجب أن يتجاوز 255 حرف.',
            'phone.required' => 'رقم الجوال مطلوب.',
            'phone.regex' => 'رقم الجوال غير صحيح. يجب أن يكون رقماً سعودياً صالحاً (مثال: 05XXXXXXXX).',
            'reservation_date.required' => 'تاريخ الحجز مطلوب.',
            'reservation_date.date' => 'تاريخ الحجز غير صحيح.',
            'reservation_date.after_or_equal' => 'يجب اختيار تاريخ اليوم أو تاريخ مستقبلي.',
            'reservation_time.required' => 'وقت الحجز مطلوب.',
            'guests.required' => 'عدد الضيوف مطلوب.',
            'guests.integer' => 'عدد الضيوف يجب أن يكون رقماً صحيحاً.',
            'guests.min' => 'عدد الضيوف يجب أن يكون 1 على الأقل.',
            'guests.max' => 'عدد الضيوف لا يجب أن يتجاوز 20 شخص.',
            'notes.max' => 'الملاحظات لا يجب أن تتجاوز 1000 حرف.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // التحقق من أن الوقت في المستقبل إذا كان الحجز لنفس اليوم
            if ($this->reservation_date && $this->reservation_time) {
                $reservationDateTime = \Carbon\Carbon::parse($this->reservation_date . ' ' . $this->reservation_time);
                
                if ($reservationDateTime->isPast()) {
                    $validator->errors()->add('reservation_time', 'لا يمكن الحجز في وقت مضى. يرجى اختيار وقت مستقبلي.');
                }
            }
        });
    }
}

