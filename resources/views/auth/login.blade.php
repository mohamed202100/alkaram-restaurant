@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="auth-wrapper" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('hq720.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="auth-card bg-white p-5 rounded shadow-lg text-center">
                    <h2 class="auth-title mb-4">أهلاً بعودتك</h2>
                    <p class="text-muted mb-4">سجل دخولك لاستكمال طلبك</p>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group mb-3 text-start">
                            <label for="email" class="form-label ms-1">البريد الإلكتروني</label>
                            <input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3 text-start">
                            <label for="password" class="form-label ms-1">كلمة المرور</label>
                            <input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-4 text-start">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label text-muted">تذكرني</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">تسجيل الدخول</button>
                        </div>

                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-muted small" href="{{ route('password.request') }}">
                                    نسيت كلمة المرور؟
                                </a>
                            @endif
                            
                            <a class="text-decoration-none text-primary small fw-bold" href="{{ route('register') }}">
                                 حساب جديد
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
