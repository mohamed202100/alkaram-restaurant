@extends('layouts.app')

@section('title', 'تواصل معنا - حجز')

@section('content')
<!-- Page Header -->
<header class="page-header" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); min-height: 450px; background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">حياك الله</h1>
        <p style="color: #f8f9fa; font-size: 1.5rem;">نسعد بخدمتك واستقبال حجوزاتك</p>
    </div>
</header>

<!-- Contact Info & Form -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="contact-info bg-white p-5 shadow-sm rounded">
                    <h3 class="mb-4">معلومات التواصل</h3>
                    <div class="info-item mb-4 display-flex align-items-center">
                        <i class="fas fa-map-marker-alt text-gold fa-2x ms-3"></i>
                        <div>
                            <h5>موقعنا</h5>
                            <p class="text-muted mb-0">طريق الملك فهد، الرياض، المملكة العربية السعودية</p>
                        </div>
                    </div>
                    <div class="info-item mb-4 display-flex align-items-center">
                        <i class="fas fa-phone text-gold fa-2x ms-3"></i>
                        <div>
                            <h5>اتصل بنا</h5>
                            <p class="text-muted mb-0">10 10 10 10 10 20+</p>
                        </div>
                    </div>
                    <div class="info-item mb-4 display-flex align-items-center">
                        <i class="fas fa-envelope text-gold fa-2x ms-3"></i>
                        <div>
                            <h5>البريد الإلكتروني</h5>
                            <p class="text-muted mb-0">info@alkaram-saudi.com</p>
                        </div>
                    </div>
                    <div class="info-item display-flex align-items-center">
                        <i class="fas fa-clock text-gold fa-2x ms-3"></i>
                        <div>
                            <h5>ساعات العمل</h5>
                            <p class="text-muted mb-0">يومياً من 12:00 ظهراً حتى 12:00 منتصف الليل</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservation Form -->
            <div class="col-lg-7">
                <div class="booking-form bg-white p-5 shadow-sm rounded">
                    <h3 class="mb-4">احجز طاولتك</h3>
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">الاسم</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">رقم الجوال</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="reservation_date" class="form-label">التاريخ</label>
                                <input type="date" class="form-control @error('reservation_date') is-invalid @enderror" id="reservation_date" name="reservation_date" value="{{ old('reservation_date') }}" required>
                                @error('reservation_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="reservation_time" class="form-label">الوقت</label>
                                <input type="time" class="form-control @error('reservation_time') is-invalid @enderror" id="reservation_time" name="reservation_time" value="{{ old('reservation_time') }}" required>
                                @error('reservation_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="guests" class="form-label">عدد الضيوف</label>
                                <input type="number" class="form-control @error('guests') is-invalid @enderror" id="guests" name="guests" min="1" value="{{ old('guests') }}" required>
                                @error('guests')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="notes" class="form-label">ملاحظات إضافية</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="4">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">تأكيد الحجز</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<section class="map-section">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15764.67385981442!2d46.6752957!3d24.7135517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2zRmluZ2VyaXMsIFJpeWFkaCBTYXVkaSBBcmFiaWE!5e0!3m2!1sen!2sus!4v1647856485648!5m2!1sen!2sus"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>
@endsection
