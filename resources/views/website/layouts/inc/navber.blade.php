@php
    use App\Models\WebsiteSetting;
    use App\Models\Category;
    $categories = Category::where('category_slug', '!=', 'default')->get(['id', 'category_name', 'image']);

    $website_setting = WebsiteSetting::first();

    $cart = session()->get('cart', []);
    $itemCount = 0;

    foreach ($cart as $item) {
        $itemCount += $item['quantity'];
    }

@endphp

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
                <div class="icon user" id="userIcon">
                    <i class="fas fa-user"></i>
                    <div class="dropdown">
                        <a href="login.html">Login</a>
                        <a href="sign-up.html">Register</a>
                        <a href="memberLogin.html">Member Login</a>
                        <a href="memberRegister.html">Member Register</a>
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
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($website_setting->website_logo) }}" alt="Rainbow Global Logo" class="img-fluid"
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
                    <div class="icon user" id="userIcon2">
                        <i class="fas fa-user"></i>
                        <div class="dropdown">
                            <a href="login.html">Login</a>
                            <a href="sign-up.html">Register</a>
                            <a href="memberLogin.html">Member Login</a>
                            <a href="memberRegister.html">Member Register</a>
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
                    <a href="{{ route('about.page') }}">About</a>
                    <div class="has-dropdown">
                        <a href="#">Shop <i class="fa-solid fa-caret-down"></i></a>
                        <div class="dropdown">
                            <a href="#">Shop Grid</a>
                            <a href="#">Product Details</a>
                        </div>
                    </div>
                    <!-- <div class="has-dropdown">
                            <a href="#">Pages</a>
                            <div class="dropdown">
                                <a href="#">Cart</a>
                                <a href="#">Checkout</a>
                            </div>
                            </div> -->
                    
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


<!-- ==================== Bottom Header End Here ==================== -->
{{-- <header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>
            <div class="header-category-two">
                <button class="header-category-two__item">
                    Categories
                    <span class="header-category-two__icon"><i class="las la-bars"></i></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('home') }}"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.page') }}">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('shop_page') }}"> Shop </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('blog.page') }}"> Blog </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.page') }}">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="header-info">
                <div class="toggle-search-box d-lg-none d-block">
                    <button type="button" class="" data-bs-toggle="modal" data-bs-target="#search-box"
                        data-bs-whatever="@mdo">
                        <i class="las la-search"></i>
                    </button>
                </div>
                {{-- <div class="header-info__wishlist">
                        <a href="wishlist.html" class="header-info__link"><i class="far fa-heart"></i></a>
                    </div> --}}
                {{-- <div class="header-info__cart">
                    <a href="{{ route('cart.page') }}" class="header-info__link"><i
                            class="fas fa-shopping-cart"></i></a>
                    <span class="header-info__cart-quantity cart-count" id="cart-count">{{ $itemCount }}</span>
                </div>
                <div class="header-info__user dropdown-custom" id="userDropdownCustom">
                    <a href="#" class="header-info__link dropdown-toggle-custom"
                        onclick="toggleUserDropdown(event)">
                        <i class="far fa-user"></i>
                        <i class="fas fa-caret-down toggle-icon"></i> <!-- This is the toggle icon -->
                    </a>
                    <div class="dropdown-menu-custom">
                        <a href="{{ route('customer.register') }}">Customer Login</a>
                        <a href="#">Member Login</a>
                        <a href="{{ route('dealer.register') }}">Dealer Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header> --}}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var query = $(this).val();

                if (query.length > 1) { // Trigger search if query has more than one character
                    $.ajax({
                        url: "{{ route('search') }}", // Your search route
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('.search-box-result ul').empty(); // Clear previous results

                            if (data.suggestions.length > 0) {
                                $('.search-box-result').show(); // Show the result box

                                data.suggestions.forEach(function(product) {
                                    $('.search-box-result ul').append(`
									<li class="search-box-list">
										<a href="${product.url}" class="search-result-item d-flex justify-content-between align-items-center">
											<div class="d-flex align-items-center gap-3">
												<img src="${product.thumbnail}" class="search-img-result" alt="${product.product_name}">
												<div>
													<p class="search-book-title">${product.product_name}</p>
												</div>
											</div>
											<div class="price-btn-container" style="display:flex; align-items:center;">
												<span class="search-book-price px-2">
													${product.discount_price
														? `<s class="text-danger">${product.regular_price} TK</s> <span class="text-success">${product.final_price} TK</span>`
														: `<span class="text-primary">${product.final_price} TK</span>`}
												</span>

												<!--<a href="${product.url}" class="btn-buy search-box-btn">Buy Now</a>-->
												</a>
												<button class="btn-buy-now btn-buy custom-search-button" data-id="${product.id}">Buy Now</button>

											</div>

									</li>
								`);
                                });
                            } else {
                                $('.search-box-result').hide(); // Hide if no results
                            }
                        }
                    });
                } else {
                    $('.search-box-result').hide(); // Hide search box when input is empty
                }
            });

            // Hide search results when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.search-container').length) {
                    $('.search-box-result').hide();
                }
            });
        });
    </script>



    <script>
        $(document).on('click', '.btn-buy-now', function() {
            let productId = $(this).data('id');
            let button = $(this);

            // Store original button text
            let originalText = button.html();

            // Show loading spinner and disable button
            button.prop('disabled', true).html(`
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...
    `);

            $.ajax({
                url: "{{ route('addToCart') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                    product_id: productId,
                    order_qty: 1
                },
                success: function(response) {
                    toastr.success(response.message, 'Success', {
                        timeOut: 1000,
                        positionClass: "toast-top-right"
                    });

                    updateCartCount(response.cart_count); // Update cart count dynamically

                    // Change button text to "Added!" for a moment, then revert
                    button.html('✔ Added!');

                    setTimeout(function() {
                        button.html(originalText).prop('disabled', false);
                    }, 1000); // Revert after 1.5 seconds
                },
                error: function() {
                    toastr.error('Failed to add product to cart.', 'Error', {
                        timeOut: 1000,
                        positionClass: "toast-top-right"
                    });

                    // Reset button state
                    button.html(originalText).prop('disabled', false);
                }
            });
        });

        // Function to update cart count dynamically
        function updateCartCount(count) {
            $('#cart-count').text(count);
            $('.cart-count').text(count);
        }
    </script>
    <script>
        function toggleUserDropdown(e) {
            e.preventDefault();
            document.getElementById('userDropdownCustom').classList.toggle('active');
        }

        // Optional: Click outside to close
        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('userDropdownCustom');
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    </script>
@endpush
