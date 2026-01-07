<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة طلب #{{ $order->id }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            padding: 30px;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            border: 1px solid #eee;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-header {
            border-bottom: 2px solid #f8f9fa;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .restaurant-name {
            color: #d35400;
            font-size: 28px;
            font-weight: bold;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        @media print {
            .no-print {
                display: none;
            }
            body {
                padding: 0;
            }
            .invoice-box {
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container no-print mb-4 text-center">
        <button onclick="window.print()" class="btn btn-primary">طباعة الفاتورة</button>
        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-secondary">إغلاق</a>
    </div>

    <div class="invoice-box">
        <div class="invoice-header d-flex justify-content-between align-items-center">
            <div>
                <div class="restaurant-name">مطعم الكرم</div>
                <div class="text-muted">طعم الأصالة والجودة</div>
            </div>
            <div class="text-start">
                <h4 class="mb-0">فاتورة طلب #{{ $order->id }}</h4>
                <div class="text-muted">التاريخ: {{ $order->created_at->format('Y-m-d H:i') }}</div>
            </div>
        </div>

        <div class="row invoice-details">
            <div class="col-6">
                <h6 class="fw-bold">معلومات العميل:</h6>
                <div>الاسم: {{ $order->customer_name }}</div>
                <div>الجوال: {{ $order->customer_phone }}</div>
                <div>العنوان: {{ $order->address }}</div>
            </div>
            <div class="col-6 text-start">
                <h6 class="fw-bold">حالة الطلب:</h6>
                <div>
                    @if($order->status == 'pending')
                        قيد الانتظار
                    @elseif($order->status == 'confirmed')
                        مؤكد
                    @elseif($order->status == 'completed')
                        مكتمل
                    @else
                        ملغي
                    @endif
                </div>
            </div>
        </div>

        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>الصنف</th>
                    <th class="text-center">السعر</th>
                    <th class="text-center">الكمية</th>
                    <th class="text-center">المجموع</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->item->name ?? 'صنف محذوف' }}</td>
                    <td class="text-center">{{ $item->price }} ريال</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-center">{{ $item->price * $item->quantity }} ريال</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="fw-bold text-primary">
                    <td colspan="3" class="text-end">الإجمالي:</td>
                    <td class="text-center">{{ $order->total_amount }} ريال</td>
                </tr>
            </tfoot>
        </table>

        @if($order->notes)
        <div class="mt-4 p-3 bg-light border rounded">
            <h6 class="fw-bold mb-1">ملاحظات:</h6>
            <p class="mb-0 small">{{ $order->notes }}</p>
        </div>
        @endif

        <div class="mt-5 pt-4 border-top text-center text-muted small">
            شكراً لتعاملكم مع مطعم الكرم
        </div>
    </div>
</body>
</html>
