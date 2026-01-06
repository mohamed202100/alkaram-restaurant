
// Product Database (Global)
const productsData = {
    'kabsa_chicken': {
        name: 'كبسة دجاج ملكية',
        price: 65,
        image: 'pngtree-grilled-chicken-drumsticks-on-yellow-rice-with-lemon-slices-png-image_19966410.png',
        desc: 'رز بشاور نثري مع دجاج محمر ومبهر بخلطتنا السرية.'
    },
    'mandi_meat': {
        name: 'مندي نعيمي',
        price: 85,
        image: 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'لحم نعيمي طازج مطبوخ في الحفرة على الحطب.'
    },
    'kabsa_hashi': {
        name: 'كبسة حاشي',
        price: 75,
        image: 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'لحم حاشي صغير طازج مع رز بشاور، طعم البادية الأصيل.'
    },
    'madfoon_meat': {
        name: 'مدفون لحم',
        price: 90,
        image: 'https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'لحم مطبوخ في قصدير تحت الأرض، طراوة لا توصف.'
    },
    'saleeg': {
        name: 'سليق طائفي',
        price: 60,
        image: 'طريقة-عمل-السليق-الطائفي-بالقشطة.jpg',
        desc: 'رز مصري مطبوخ بالحليب والسمن البلدي مع دجاج محمر.'
    },
    'mathbi_chicken': {
        name: 'مظبي دجاج',
        price: 55,
        image: 'pngtree-delicious-mutton-biryani-dish-presented-in-a-round-bowl-ready-to-png-image_17553933.webp',
        desc: 'دجاج مشوي على الحجر، نكهة شواء مميزة ورز شعبي.'
    },
    'jareesh': {
        name: 'جريش باللبن',
        price: 45,
        image: 'https://images.unsplash.com/photo-1594041680534-e8c8cdebd659?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'جريش حب مطبوخ باللبن الطازج ومزين بالمسمنة.'
    },
    'qursan': {
        name: 'قرصان بالخضار',
        price: 40,
        image: 'hq720.jpg',
        desc: 'رقائق القرصان المشربة بمرق اللحم والخضروات الطازجة.'
    },
    'marqoq': {
        name: 'مرقوق',
        price: 50,
        image: 'https://images.unsplash.com/photo-1547592180-85f173990554?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'عجين بر مطبوخ مع اللحم والخضار، وجبة متكاملة.'
    },
    'matazeez': {
        name: 'مطازيز',
        price: 50,
        image: 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'أقراص عجين صغيرة مطبوخة بمرق أحمر ولحم.'
    },
    'green_salad': {
        name: 'سلطة خضراء',
        price: 15,
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'تشكيلة خضروات طازجة مع زيت الزيتون والليمون.'
    },
    'hot_salad': {
        name: 'سلطة حارة (دقوس)',
        price: 5,
        image: 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'طماطم وفلفل حار وثوم، رفيق الكبسة الأول.'
    },
    'tahina': {
        name: 'طحينة',
        price: 5,
        image: 'https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'طحينة سائلة متبلة بالليمون والكمون.'
    },
    'samosa_meat': {
        name: 'سمبوسة لحم (4 حبات)',
        price: 12,
        image: 'https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'مقرمشة ومحشية لحم مفروم طازج وبقدونس.'
    },
    'samosa_cheese': {
        name: 'سمبوسة جبن (4 حبات)',
        price: 10,
        image: 'https://images.unsplash.com/photo-1541518763669-27fef04b14ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'محشية بخلطة أجبان مميزة ونعناع.'
    },
    'oats_soup': {
        name: 'شوربة شوفان',
        price: 15,
        image: 'soup_soup.webp',
        desc: 'شوربة كويكر التقليدية باللحم والليمون الأسود.'
    },
    'hanini': {
        name: 'حنيني فاخر',
        price: 35,
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'حنيني بالتمر والبر مع الزبدة والهيل.'
    },
    'kunafa': {
        name: 'كنافة بالقشطة',
        price: 25,
        image: 'https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'كنافة ذهبية محشية قشطة طازجة ومسقية شيرة.'
    },
    'luqaimat': {
        name: 'لقيمات (صحن)',
        price: 20,
        image: 'https://images.unsplash.com/photo-1598214886806-c87b84b7078b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'كرات ذهبية مقرمشة بدبس التمر والسمسم.'
    },
    'masoub': {
        name: 'معصوب ملكي',
        price: 25,
        image: 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'موز وفطير مع قشطة، عسل، وجبنة شيدر.'
    },
    'dates': {
        name: 'تمر سكري فاخر',
        price: 15,
        image: 'https://images.unsplash.com/photo-1559563362-c667ba5f5480?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'صحن تمر سكري رطب من مزارع القصيم.'
    },
    'laban_mint': {
        name: 'لبن بالنعناع',
        price: 15,
        image: 'https://images.unsplash.com/photo-1576506295286-5cda18df43e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'لبن طازج مخفوق مع النعناع والثلج.'
    },
    'pepsi': {
        name: 'بيبسي / سفن أب',
        price: 5,
        image: 'https://images.unsplash.com/photo-1629203851122-3726ecdf080e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'مشروبات غازية باردة (علبة).'
    },
    'orange_juice': {
        name: 'عصير برتقال طازج',
        price: 20,
        image: 'https://images.unsplash.com/photo-1613478223719-2ab802602423?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'عصير برتقال طبيعي 100% بدون سكر.'
    },
    'lemon_mint': {
        name: 'ليمون بالنعناع',
        price: 18,
        image: 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'منعش وبارد، خلطة خاصة.'
    },
    'arabic_coffee': {
        name: 'دلة قهوة عربية',
        price: 30,
        image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'قهوة شقراء بالهيل والزعفران (ترمس كبير).'
    },
    'red_tea': {
        name: 'براد شاي أحمر',
        price: 15,
        image: '7c0563ca-f243-456b-9484-07246817b983-thumbnail-500x500-70.jpg',
        desc: 'شاي تلقيمة مخدر على الجمر.'
    },
    'adani_tea': {
        name: 'شاي عدني',
        price: 10,
        image: 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'شاي بالحليب والهيل والقرنفل.'
    },
    'water': {
        name: 'ماء (نوفا)',
        price: 2,
        image: 'https://images.unsplash.com/photo-1564419320461-6870880221ad?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'زجاجة ماء 330 مل.'
    },
    'kunafa_nutella': {
        name: 'كنافة نوتيلا',
        price: 30,
        image: 'https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        desc: 'لعشاق الشوكولاتة، كنافة غرقانة نوتيلا.'
    }
};

// Global Cart Functions
window.updateCartCount = () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const badges = document.querySelectorAll('.cart-badge');
    badges.forEach(badge => {
        badge.textContent = totalItems;
        badge.style.display = totalItems > 0 ? 'inline-flex' : 'none';
    });
};

window.addToCart = (name, price, image, quantity = 1) => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItemIndex = cart.findIndex(item => item.name === name);

    if (existingItemIndex > -1) {
        cart[existingItemIndex].quantity += quantity;
    } else {
        cart.push({ name, price, image, quantity });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    showToast(`تم إضافة ${name} للسلة`);
};

function showToast(message) {
    let toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.classList.add('show'), 100);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => document.body.removeChild(toast), 300);
    }, 3000);
}

document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Toggle
    const mobileBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');

    if (mobileBtn) {
        mobileBtn.addEventListener('click', () => {
            mobileBtn.classList.toggle('active');
            navLinks.classList.toggle('active');
            document.body.classList.toggle('no-scroll');
        });
    }

    // Close mobile menu when clicking a link
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            mobileBtn.classList.remove('active');
            navLinks.classList.remove('active');
            document.body.classList.remove('no-scroll');
        });
    });

    // Scroll Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.scroll-reveal').forEach(el => {
        observer.observe(el);
    });

    // Navbar Scroll Effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            navbar.style.padding = '0.5rem 0';
        } else {
            navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
            navbar.style.padding = '1rem 0';
        }
    });

    // Favorites Functionality
    const initFavorites = () => {
        const favBtns = document.querySelectorAll('.fav-btn');
        const favorites = JSON.parse(localStorage.getItem('favorites')) || [];

        favBtns.forEach(btn => {
            const itemName = btn.dataset.name;
            if (favorites.includes(itemName)) {
                btn.classList.add('active');
                if (btn.querySelector('i')) {
                    btn.querySelector('i').classList.remove('far');
                    btn.querySelector('i').classList.add('fas');
                }
            }

            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const name = btn.dataset.name;
                const index = favorites.indexOf(name);
                if (index === -1) {
                    favorites.push(name);
                    btn.classList.add('active');
                } else {
                    favorites.splice(index, 1);
                    btn.classList.remove('active');
                }
                localStorage.setItem('favorites', JSON.stringify(favorites));
            });
        });
    };
    initFavorites();

    // Initialize Cart Count
    updateCartCount();

    // Handle Product Details Page Dynamic Loading
    if (window.location.pathname.includes('product-details.html')) {
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');

        if (productId && productsData[productId]) {
            const product = productsData[productId];

            const imgEl = document.getElementById('product-image');
            const nameEl = document.getElementById('product-name');
            const priceEl = document.getElementById('product-price');
            const descEl = document.getElementById('product-description');

            if (imgEl) imgEl.src = product.image;
            if (nameEl) nameEl.textContent = product.name;
            if (priceEl) priceEl.textContent = product.price + ' ريال';
            if (descEl) descEl.textContent = product.desc;

            // Setup Details Page Add to Cart Button
            window.addToCartFromDetails = () => {
                const qtyInput = document.getElementById('product-qty');
                const quantity = parseInt(qtyInput.value) || 1;
                addToCart(product.name, product.price, product.image, quantity);
            };
        }
    }
});
