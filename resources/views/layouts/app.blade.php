<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'مطعم الكرم السعودي')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 for Logic (Optional if using custom css only, but good for alerts) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Vite (for Breeze styles/scripts if needed later, but keeping visual style consistent with original) -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

    <style>
        /* Small overrides to make Bootstrap play nice with custom CSS if needed */
        a { text-decoration: none; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar-custom">
        <div class="container nav-container">
            <a href="{{ route('home') }}" class="logo">الكرم <span class="text-gold">السعودي</span></a>
            
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">قصتنا</a></li>
                <li><a href="{{ route('menu.index') }}" class="{{ request()->routeIs('menu.*') ? 'active' : '' }}">المنيو</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">حجز طاولة</a></li>
                
                @auth
                    @if(auth()->user()->role === 'admin')
                        <li><a href="{{ route('admin.dashboard') }}" class="text-primary fw-bold">لوحة التحكم</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-link" style="background:none; border:none; color:inherit; font-family:inherit; cursor:pointer; padding: 0;">خروج</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">دخول</a></li>
                    <li><a href="{{ route('register') }}">تسجيل</a></li>
                @endauth
                
                <li class="cart-icon">
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-basket"></i>
                        @if(session('cart'))
                            <span class="badge bg-gold" style="background-color: var(--primary-color); color: white; border-radius: 50%; padding: 2px 6px; font-size: 0.7rem; position: relative; top: -10px;">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                </li>
            </ul>

            <button class="mobile-menu-btn" aria-label="Toggle menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </nav>
    
    <style>
        /* Custom Navbar Styles tailored for Laravel integration */
        .navbar-custom {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
        }
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-links {
            display: flex;
            list-style: none;
            align-items: center;
            gap: 2rem;
            margin: 0;
            padding: 0;
        }
        .nav-links a, .btn-link {
            color: var(--text-color);
            font-weight: 500;
            transition: color 0.3s;
            font-size: 1.1rem;
        }
        .nav-links a:hover, .nav-links a.active, .btn-link:hover {
            color: var(--primary-color);
        }
        body { padding-top: 80px; } /* Prevent content from hiding behind fixed nav */
    </style>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-col">
                <h3>الكرم <span class="text-gold">السعودي</span></h3>
                <p>ننقل لكم عراقة الماضي وأصالة الطعم السعودي في كل طبق نقدمه.</p>
            </div>
            <div class="footer-col">
                <h4>روابط سريعة</h4>
                <ul>
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">قصتنا</a></li>
                    <li><a href="{{ route('menu.index') }}">المنيو</a></li>
                    <li><a href="{{ route('contact') }}">حجز طاولة</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>تواصل معنا</h4>
                <p><i class="fas fa-map-marker-alt text-gold" style="margin-left: 10px;"></i> طريق الملك فهد، الرياض</p>
                <p><i class="fas fa-phone text-gold" style="margin-left: 10px;"></i> 10 10 10 10 10 20+</p>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p>&copy; 2024 مطعم الكرم السعودي. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
