@extends('layouts.admin')

@section('content')
<h2 class="mb-4">لوحة القيادة</h2>

<div class="row g-4 mb-4">
    <!-- Categories Count -->
    <div class="col-md-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">الأقسام</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\Category::count() }}</h2>
                    </div>
                    <i class="fas fa-list fa-2x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="{{ route('admin.categories.index') }}" class="text-white text-decoration-none small">إدارة الأقسام <i class="fas fa-arrow-left ms-1"></i></a>
            </div>
        </div>
    </div>
    
    <!-- Items Count -->
    <div class="col-md-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">الأطباق</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\Item::count() }}</h2>
                    </div>
                    <i class="fas fa-utensils fa-2x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="{{ route('admin.items.index') }}" class="text-white text-decoration-none small">إدارة الأطباق <i class="fas fa-arrow-left ms-1"></i></a>
            </div>
        </div>
    </div>

    <!-- Orders Count -->
    <div class="col-md-3">
        <div class="card bg-warning text-dark h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">الطلبات الجديدة</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\Order::where('status', 'pending')->count() }}</h2>
                    </div>
                    <i class="fas fa-shopping-bag fa-2x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="{{ route('admin.orders.index') }}" class="text-dark text-decoration-none small">عرض الطلبات <i class="fas fa-arrow-left ms-1"></i></a>
            </div>
        </div>
    </div>

    <!-- Reservations Count -->
    <div class="col-md-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">حجوزات اليوم</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\Reservation::whereDate('reservation_date', today())->count() }}</h2>
                    </div>
                    <i class="fas fa-calendar-check fa-2x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0">
                <a href="{{ route('admin.reservations.index') }}" class="text-white text-decoration-none small">إدارة الحجوزات <i class="fas fa-arrow-left ms-1"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">آخر الطلبات</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>رقم الطلب</th>
                                <th>العميل</th>
                                <th>المجموع</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Order::latest()->take(5)->get() as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->total_amount }} ريال</td>
                                <td><span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'confirmed' ? 'primary' : ($order->status == 'completed' ? 'success' : 'danger')) }}">{{ $order->status }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">آخر الحجوزات</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>الاسم</th>
                                <th>التاريخ</th>
                                <th>الوقت</th>
                                <th>الضيوف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Reservation::latest()->take(5)->get() as $reservation)
                            <tr>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->reservation_date->format('Y-m-d') }}</td>
                                <td>{{ $reservation->reservation_time }}</td>
                                <td>{{ $reservation->guests }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
