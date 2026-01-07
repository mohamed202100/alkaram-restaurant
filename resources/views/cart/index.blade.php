@extends('layouts.app')

@section('title', 'سلة المشتريات')

@section('content')
<header class="page-header" style="background-image: url('https://images.unsplash.com/photo-1555244162-803834f70033?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); padding: 4rem 0;">
    <div class="container text-center">
        <h1>سلة طلباتك</h1>
    </div>
</header>

<section class="section-padding">
    <div class="container">
        @if(session('cart') && count(session('cart')) > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table cart-table">
                            <thead>
                                <tr>
                                    <th style="width: 50%">الطبق</th>
                                    <th style="width: 15%">السعر</th>
                                    <th style="width: 20%">الكمية</th>
                                    <th style="width: 15%">المجموع</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if(isset($details['image']) && $details['image'])
                                                    <img src="{{ asset('storage/' . $details['image']) }}" width="60" class="rounded me-3" alt="...">
                                                @else
                                                    <img src="https://via.placeholder.com/60" width="60" class="rounded me-3" alt="...">
                                                @endif
                                                <h5 class="mb-0 ms-3">{{ $details['name'] }}</h5>
                                            </div>
                                        </td>
                                        <td>{{ $details['price'] }} ريال</td>
                                        <td>
                                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" min="1" max="50" style="width: 70px;">
                                        </td>
                                        <td class="text-center">{{ $details['price'] * $details['quantity'] }} ريال</td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="bg-white p-4 shadow-sm rounded">
                        <h4 class="mb-3">ملخص الطلب</h4>
                        <div class="d-flex justify-content-between mb-3">
                            <span>المجموع</span>
                            <strong>{{ $total }} ريال</strong>
                        </div>
                        <hr>
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">الاسم <span class="text-danger">*</span></label>
                                <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" maxlength="255" required>
                                @error('customer_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">رقم الجوال <span class="text-danger">*</span></label>
                                <input type="tel" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" value="{{ old('customer_phone') }}" placeholder="05XXXXXXXX" pattern="^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$" required>
                                @error('customer_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">مثال: 0512345678</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">العنوان <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="الحي، الشارع، البناية..." maxlength="500" required>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ملاحظات</label>
                                <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="2" maxlength="1000">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">إتمام الطلب</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-shopping-basket fa-4x text-muted mb-4"></i>
                <h3>السلة فارغة</h3>
                <p>لم تقم بإضافة أي أطباق للسلة بعد.</p>
                <a href="{{ route('menu.index') }}" class="btn btn-primary mt-3">تصفح المنيو</a>
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.parents("tr").attr("data-id");
        var quantity = ele.val();
        
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}', 
                id: id, 
                quantity: quantity
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");

        if(confirm("هل أنت متأكد من حذف هذا الطبق؟")) {
            $.ajax({
                url: '{{ route('cart.remove') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: id
                },
                success: function (response) {
                    window.location.reload();
                },
                error: function (xhr) {
                    alert('حدث خطأ أثناء الحذف. حاول مرة أخرى.');
                    console.log(xhr.responseText);
                }
            });
        }
    });
</script>
<style>
    .cart-table th { padding: 1rem; background-color: #f8f9fa; }
    .cart-table td { padding: 1rem; vertical-align: middle; }
</style>
@endpush
@endsection
