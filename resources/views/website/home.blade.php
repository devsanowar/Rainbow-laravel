@php
    use App\Models\WebsiteSetting;
    $website_setting = WebsiteSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $website_setting->website_title }} | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend') }}/assets/icons/favicon.ico" type="image/x-icon" />

    @include('website.layouts.inc.style')
</head>

<body>

    @include('website.layouts.inc.header')

    <!-- Swiper Slider -->
    <div class="swiper hero-swiper" style="background-color: #f8f9fa;">
        <div class="swiper-wrapper">

            <!-- Slide 1 -->
            <div class="swiper-slide first-slide-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start">
                            <h1 class="display-5 fw-bold">Explore Fashion & Beauty</h1>
                            <p class="lead">Stylish fashion and premium beauty products curated just for you.Premium
                                fashion accessories that match your lifestyle and elegance.</p>
                            <a href="#" class="rainbow-btn mt-3">Shop Collection</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('frontend') }}/assets/images/slider/hero-img.png" alt="Fashion Product"
                                class="img-fluid rounded shadow" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide second-slide-bg">
                <div class="container ">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start">
                            <h1 class="display-5 fw-bold">Feel Radiant, Be Confident</h1>
                            <p class="lead">Discover skincare and cosmetics that highlight your natural beauty.
                                Premium fashion accessories that match your lifestyle and elegance.</p>
                            <a href="#" class="rainbow-btn mt-3">Browse Beauty</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('frontend') }}/assets/images/slider/ss-2.avif" alt="Skincare Product"
                                class="img-fluid rounded shadow" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide three-slide-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start">
                            <h1 class="display-5 fw-bold">Luxury in Every Detail</h1>
                            <p class="lead">Premium fashion accessories that match your lifestyle and elegance.Premium
                                fashion accessories that match your lifestyle and elegance.</p>
                            <a href="#" class="rainbow-btn mt-3">Explore Accessories</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('frontend') }}/assets/images/slider/ss-3.avif" alt="Accessories"
                                class="img-fluid rounded shadow" />
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Swiper Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>



    <!-- ======= HEADER END ======= -->

    <!-- ======= MAIN CONTENT START ======= -->
    <main>
        <!-- =======Supprt Section Start========== -->
        <section class="support-section">
            <div class="container">
                <div class="all-supports">
                    <div class="row">
                        <!-- single support colum -->
                        <div class="col-md-3">
                            <div class="single-support">
                                <div>
                                    <img src="{{ asset('frontend') }}/assets/images/support/support-1.png"
                                        class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4>Free Shipping</h4>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>
                        <!-- single support colum -->
                        <div class="col-md-3">
                            <div class="single-support">
                                <div>
                                    <img src="{{ asset('frontend') }}/assets/images/support/support-2.png"
                                        class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4>Support 24/7</h4>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>
                        <!-- single support colum -->
                        <div class="col-md-3">
                            <div class="single-support">
                                <div>
                                    <img src="{{ asset('frontend') }}/assets/images/support/support-3.png"
                                        class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4>Money Return</h4>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>
                        <!-- single support colum -->
                        <div class="col-md-3">
                            <div class="single-support">
                                <div>
                                    <img src="{{ asset('frontend') }}/assets/images/support/support-4.png"
                                        class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h4>Order Discount</h4>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========Categories Section Start=============== -->
        <section class="categories-section">
            <div class="container">
                <div class="section-title">
                    <h2>Categories</h2>
                </div>
                <div class="all-categories-row">
                    <div class="row">

                        @forelse ($categories as $category)
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="single-category">
                                    <img src="{{ asset($category->image) }}" class="img-fluid" alt="category_1_img">
                                    <h4><a href="#">{{ $category->category_name }}</a></h4>
                                </div>
                            </div>
                        @empty
                            <h4 style="color:#ccc; text-align: center;">Category not found!!</h4>
                        @endforelse

                    </div>
                </div>
            </div>
        </section>
        <!-- =========Quality Product Section Start ============= -->
        @include('website.layouts.pages.home.product')

        <!-- Featured Section Start -->
        <section id="featured-logo-section">
            <div class="container">
                <div class="row align-items-center featured-section">
                    <div class="col-md-2 d-flex align-items-center">
                        <h3 class="featured-title">Featured In</h3>
                    </div>
                    <div class="col-md-10">
                        <div class="featured-logo-wrapper overflow-hidden">
                            <div class="featured-logo-track d-flex" id="logoTrack">
                                <img src="{{ asset('frontend') }}/assets/images/features/logo1.png"
                                    class="img-fluid logo-item" alt="" />
                                <img src="{{ asset('frontend') }}/assets/images/features/logo2.png"
                                    class="img-fluid logo-item" alt="" />
                                <img src="{{ asset('frontend') }}/assets/images/features/logo3.png"
                                    class="img-fluid logo-item" alt="" />
                                <img src="{{ asset('frontend') }}/assets/images/features/logo4.png"
                                    class="img-fluid logo-item" alt="" />
                                <img src="{{ asset('frontend') }}/assets/images/features/logo5.png"
                                    class="img-fluid logo-item" alt="" />
                                <img src="{{ asset('frontend') }}/assets/images/features/logo3.png"
                                    class="img-fluid logo-item" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured Section End -->
        <!-- Top Selling Product -->
        <section class="top-selling-product">
            <div class="container">
                <div class="section-title">
                    <h2>Top Selling Product</h2>
                </div>
                <div class="row g-4">
                    <!-- Product 1 -->
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="single-top-selling shadow p-4 h-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="top-selling-img mb-3 text-center">
                                        <img src="{{ asset('frontend') }}/assets/images/product/p-5.jpg"
                                            class="img-fluid rounded" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="top-selling-content text-center text-md-start">
                                        <div class="reviews mb-2">
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                        </div>
                                        <h4 class="top-selling-title fs-5">
                                            <a href="singleProduct.html">Turmeric Curcumin Powder</a>
                                            <!-- <p class="text-muted mt-3">Anti-Inflammatory Support</p> -->
                                        </h4>
                                        <p class="selling-price mb-2">
                                            <span class="text-decoration-line-through text-muted me-2">300</span>
                                            <span class="fw-bold text-success">250</span>
                                        </p>
                                        <a href="#" class="btn btn-primary rainbow-btn">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Repeat for each product with different image or title -->
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="single-top-selling shadow p-4 h-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="top-selling-img mb-3 text-center">
                                        <img src="{{ asset('frontend') }}/assets/images/product/p-2.jpg"
                                            class="img-fluid rounded" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="top-selling-content text-center text-md-start">
                                        <div class="reviews mb-2">
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                        </div>
                                        <h4 class="top-selling-title fs-5">
                                            <a href="singleProduct.html">Moringa Leaf Powder</a>
                                        </h4>
                                        <p class="selling-price mb-2">
                                            <span class="text-decoration-line-through text-muted me-2">300</span>
                                            <span class="fw-bold text-success">250</span>
                                        </p>
                                        <a href="#" class="btn btn-primary rainbow-btn">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="single-top-selling shadow p-4 h-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="top-selling-img mb-3 text-center">
                                        <img src="{{ asset('frontend') }}/assets/images/product/p-2.jpg"
                                            class="img-fluid rounded" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="top-selling-content text-center text-md-start">
                                        <div class="reviews mb-2">
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                        </div>
                                        <h4 class="top-selling-title fs-5">
                                            <a href="singleProduct.html">Fenugreek Seed Powder</a>
                                        </h4>
                                        <p class="selling-price mb-2">
                                            <span class="text-decoration-line-through text-muted me-2">300</span>
                                            <span class="fw-bold text-success">250</span>
                                        </p>
                                        <a href="#" class="btn btn-primary rainbow-btn">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="single-top-selling shadow p-4 h-100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="top-selling-img mb-3 text-center">
                                        <img src="{{ asset('frontend') }}/assets/images/product/p-5.jpg"
                                            class="img-fluid rounded" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="top-selling-content text-center text-md-start">
                                        <div class="reviews mb-2">
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                        </div>
                                        <h4 class="top-selling-title fs-5">
                                            <a href="singleProduct.html">Ashwagandha Root Powder</a>
                                        </h4>
                                        <p class="selling-price mb-2">
                                            <span class="text-decoration-line-through text-muted me-2">300</span>
                                            <span class="fw-bold text-success">250</span>
                                        </p>
                                        <a href="#" class="btn btn-primary rainbow-btn">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- ======= MAIN CONTENT END ======= -->

    @include('website.layouts.inc.footer')
    <!-- ======= FOOTER END ======= -->
    @include('website.layouts.inc.script')

    <script>
        $(document).ready(function() {
            $(document).on('submit', '.add-to-cart-form', function(e) {
                e.preventDefault();

                let form = $(this);
                let formData = form.serialize();

                let button = form.find('.btn-buy');
                let spinner = button.find('.spinner-border');

                button.prop('disabled', true);
                spinner.removeClass('d-none');

                $.ajax({
                    url: "{{ route('addToCart') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        toastr.success(response.message, '', {
                            timeOut: 1500
                        });

                        $('#cart-count').text(response.itemCount);

                        spinner.addClass('d-none');
                        button.prop('disabled', false);

                        // ✅ Full cart body refresh from server
                        if (response.cart_html) {
                            $('#cartBody').html(response.cart_html);
                        }
                    },
                    error: function() {
                        toastr.error('Failed to add product.', '', {
                            timeOut: 2000
                        });

                        spinner.addClass('d-none');
                        button.prop('disabled', false);
                    }
                });
            });
        });
    </script>


</body>

</html>
