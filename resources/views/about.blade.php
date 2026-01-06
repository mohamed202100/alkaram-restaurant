@extends('layouts.app')

@section('title', 'قصتنا')

@section('content')
<!-- Page Header -->
<header class="page-header" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1590577976322-3d2d6e2130d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); min-height: 450px; background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">قصة الكرم</h1>
        <p style="color: #f8f9fa; font-size: 1.5rem;">من قلب نجد.. بدأت الحكاية</p>
    </div>
</header>

<!-- Main Story -->
<section class="section-padding">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <h4 class="text-gold">البداية</h4>
                <h2>شغف توارثناه أباً عن جد</h2>
                <p>تأسس مطعم الكرم السعودي برؤية بسيطة ولكن عميقة: تقديم المأكولات السعودية الأصيلة كما كانت تطهى في
                    بيوت أجدادنا، مع لمسة من الرقي والخدمة العصرية.</p>
                <p>بدأت رحلتنا من شغفنا بالتراث السعودي الغني، وحبنا للضيافة التي اشتهر بها العرب. أردنا أن نخلق مكاناً
                    لا يقدم مجرد طعام، بل يقدم تجربة ثقافية متكاملة، تعيدك إلى ذكريات الزمن الجميل.</p>
                <p>نحرص في الكرم على اختيار أجود المكونات المحلية، من اللحوم الطازجة، لبهاراتنا الخاصة التي نحضرها
                    بأنفسنا، وصولاً إلى الأرز البشاور الفاخر.</p>
            </div>
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                    alt="داخل المطعم">
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="section-padding" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="value-card p-4">
                    <i class="fas fa-heart text-gold mb-3" style="font-size: 2.5rem;"></i>
                    <h3>شغفنا</h3>
                    <p>نطبخ بحب، ونقدم بقلب. كل طبق يخرج من مطبخنا هو رسالة محبة لضيوفنا.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card p-4">
                    <i class="fas fa-certificate text-gold mb-3" style="font-size: 2.5rem;"></i>
                    <h3>جودتنا</h3>
                    <p>لا نساوم أبداً على الجودة. نختار الأفضل لنقدم الأفضل، لأنكم تستحقون.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card p-4">
                    <i class="fas fa-hand-holding-heart text-gold mb-3" style="font-size: 2.5rem;"></i>
                    <h3>ضيافتنا</h3>
                    <p>الكرم هو اسمنا وهويتنا. نرحب بكم بابتسامة، ونخدمكم بكل اهتمام.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
