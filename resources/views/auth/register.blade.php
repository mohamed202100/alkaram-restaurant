@extends('layouts.app')

@section('title', 'إنشاء حساب جديد')

@section('content')
<div class="auth-wrapper" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('hq720.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-card bg-white p-5 rounded shadow-lg text-center">
                    <h2 class="auth-title mb-4">انضم لعائلتنا</h2>
                    <p class="text-muted mb-4">أنشئ حسابك الجديد واستمتع بتجربة طلب أسهل</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group mb-3 text-start">
                            <label for="name" class="form-label ms-1">الاسم الكامل</label>
                            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger small" />
                        </div>

                        <!-- Email Address -->
                        <div class="form-group mb-3 text-start">
                            <label for="email" class="form-label ms-1">البريد الإلكتروني</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3 text-start">
                            <label for="password" class="form-label ms-1">كلمة المرور</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-4 text-start">
                            <label for="password_confirmation" class="form-label ms-1">تأكيد كلمة المرور</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger small" />
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">إنشاء حساب</button>
                        </div>

                        <div class="mt-4">
                            <span class="text-muted small">لديك حساب بالفعل؟</span>
                            <a class="text-decoration-none text-primary small fw-bold ms-1" href="{{ route('login') }}">
                                تسجيل الدخول
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
