@php
    use App\Models\WebsiteSetting;
    $website_setting = WebsiteSetting::first();
@endphp


<!-- Header Menu Start -->
<header>
    <div class="container">
        <div class="top-bar">
            <div class="left">
                <div class="menu-toggle" onclick="toggleMobileNav()">
                    <span></span><span></span><span></span>
                </div>
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($website_setting->website_logo) }}" alt="Rainbow Global Logo" class="img-fluid"
                            style="height: 25px;">
                    </a>
                </div>
            </div>

            <div class="center">
                <div class="search-bar">
                    <input type="text" placeholder="Search..." />
                    <select>
                        <option value="">All</option>
                        <option value="electronics">Electronics</option>
                        <option value="fashion">Fashion</option>
                    </select>
                    <button><i class="fas fa-search"></i></button>
                </div>
            </div>

            <div class="right">
                <div class="icon">
                    <i class="fas fa-bag-shopping"></i>
                    <span>15</span>
                    <div class="dropdown">
                        <p>View Cart</p>
                    </div>
                </div>
                <div class="icon-user" id="userIcon">
                    <i class="fas fa-user"></i>
                    <div class="dropdown">
                        <a href="{{ route('customer.loginForm') }}">Customer Login</a>
                        <a href="{{ route('customer.registerForm') }}">Customer Register</a>
                        <a href="{{ route('member.loginForm') }}">Member Login</a>
                        <a href="{{ route('member.registerForm') }}">Member Register</a>
                        <a href="#">Dashboard</a>
                    </div>
                </div>
            </div>
            <!-- mobile sticky bar menu -->
            <div class="mobile-sticky-bar-menu">
                <div class="menu-toggle" onclick="toggleMobileNav()">
                    <span></span><span></span><span></span>
                </div>
                <div class="logo">
                    <a href="#">
                        <img src="assets/images/logo/logo-main.png" alt="Rainbow Global Logo" class="img-fluid"
                            style="height: 50px;">
                    </a>
                </div>
                <div class="user-cart-icons d-flex align-items-center gap-3">
                    <div class="icon">
                        <i class="fas fa-bag-shopping"></i>
                        <span>15</span>
                        <div class="dropdown">
                            <p>View Cart</p>
                        </div>
                    </div>
                    <div class="icon-user" id="userIcon">
                        <i class="fas fa-user"></i>
                        <div class="dropdown">
                            <a href="{{ route('customer.loginForm') }}">Customer Login</a>
                            <a href="{{ route('customer.registerForm') }}">Customer Register</a>
                            <a href="{{ route('member.loginForm') }}">Member Login</a>
                            <a href="{{ route('member.registerForm') }}">Member Register</a>
                            <a href="#">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar-menu-items">
        <div class="container">
            <div class="nav-bar">
                <nav>
                    <a href="{{ route('home') }}">Home</a>
                    <div class="has-dropdown">
                        <a href="#">Shop <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown">
                            <a href="#">Shop Grid</a>
                            <a href="#">Product Details</a>
                        </div>
                    </div>

                    <a href="{{ route('about.page') }}">About</a>
                    <a href="{{ route('blog.page') }}">Blog</a>
                    <a href="{{ route('contact.page') }}">Contact</a>
                </nav>
                <div class="nav-actions">
                    <a href="#" class="seller-btn">Get Offers</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-nav" id="mobileNav">
    <div class="mobile-close" onclick="toggleMobileNav()">×</div>
    <a href="index.html">Home</a>
    <a href="#">Shop</a>
    <a href="#">Product Details</a>
    <a href="#">Cart</a>
    <a href="#">Checkout</a>
    <a href="about.html">About</a>
    <a href="blog.html">Blog</a>
    <a href="contact.html">Contact</a>
    <a href="#" class="seller-btn" style="margin-top:20px;">Become a Seller</a>
</div>



@push('scripts')
<script>
    const userIcon = document.getElementById('userIcon');

    // Toggle dropdown on click
    userIcon.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent bubbling
        this.classList.toggle('active');
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function(e) {
        if (!userIcon.contains(e.target)) {
            userIcon.classList.remove('active');
        }
    });
</script>
@endpush
