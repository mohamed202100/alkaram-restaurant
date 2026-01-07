@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2> تفاصيل الطلب #{{ $order->id }}</h2>
    <div>
        <a href="{{ route('admin.orders.print', $order->id) }}" target="_blank" class="btn btn-primary me-2"><i class="fas fa-print me-2"></i> طباعة الفاتورة</a>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-right me-2"></i> عودة للقائمة</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">الأصناف المطلوبة</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>الطبق</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>المجموع</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->item->name ?? 'Deleted Item' }}</td>
                            <td>{{ $item->price }} ريال</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price * $item->quantity }} ريال</td>
                        </tr>
                        @endforeach
                        <tr class="table-light fw-bold">
                            <td colspan="3" class="text-end">الإجمالي الكلي:</td>
                            <td>{{ $order->total_amount }} ريال</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">معلومات العميل</h5>
            </div>
            <div class="card-body">
                <p><strong>الاسم:</strong> {{ $order->customer_name }}</p>
                <p><strong>الجوال:</strong> {{ $order->customer_phone }}</p>
                <p><strong>العنوان:</strong> {{ $order->address }}</p>
                <p><strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d h:i A') }}</p>
                @if($order->notes)
                    <div class="alert alert-secondary mb-0">
                        <strong>ملاحظات:</strong><br>
                        {{ $order->notes }}
                    </div>
                @endif
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">تحديث الحالة</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label">حالة الطلب</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>مؤكد (جاري التحضير)</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>مكتمل</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">تحديث</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
