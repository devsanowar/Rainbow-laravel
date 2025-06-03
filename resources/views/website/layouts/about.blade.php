@extends('website.layouts.app')
@section('title', 'About page')
@section('website_content')

<main>
        <!-- About Content -->
        <section class="about-ritaxes py-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Column - Text Content -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="pe-lg-5">
                            <h6 class="text-uppercase mb-3">ABOUT Rainbow Global</h6>
                            <h2 class="display-5 fw-bold mb-4">Innovative Strategies <br>for Tax Prosperity</h2>
                            <p class="lead mb-4">Duis et dolor vel neque faucibus tincidunt. Nulla semper condimentum
                                tellus in ultricies. Nunc tempor ipsum nec fermentum consequat. Cras et felis ultricies,
                                molestie dolor sit amet, condimentum ante.</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled mb-4 mb-md-0">
                                        <li class="mb-2 d-flex align-items-start">
                                            <span class="me-2 text-primary">✓</span>
                                            <span>Curabitur gravida sem</span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start">
                                            <span class="me-2 text-primary">✓</span>
                                            <span>Mauris tempor ac erat</span>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <span class="me-2 text-primary">✓</span>
                                            <span>Fusce eleifend lectus</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2 d-flex align-items-start">
                                            <span class="me-2 text-primary">✓</span>
                                            <span>Fusce non sodales dui</span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start">
                                            <span class="me-2 text-primary">✓</span>
                                            <span>Class aptent taciti</span>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <span class="me-2 text-primary">✓</span>
                                            <span>Nam elementum semper</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Experience Badge -->
                    <div class="col-lg-6">
                        <div class="experience-badge bg-light p-5 rounded text-center position-relative"
                            style="max-width: 300px; margin: 0 auto;">
                            <div class="position-absolute top-0 start-50 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px; transform: translateY(-50%);">
                                <span class="fw-bold fs-4">25+</span>
                            </div>
                            <h3 class="mt-5 mb-3 fw-bold">Years of Experience</h3>
                            <a href="#" class="btn btn-outline-primary px-4">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials section start -->
        <section id="testimonials-section" class="testimonials-section">
            <div class="container">
                <div class="section-title">
                    <h2>Cleints Feedback</h2>
                </div>
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="reviews">
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                                <p>
                                    “Amazing support and lightning‑fast delivery. I went from zero
                                    to hero in just a week!”
                                </p>
                                <div class="testimonial-footer">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe" />
                                    <div>
                                        <h4>John Doe</h4>
                                        <p>Web Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="reviews">
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                </div>
                                <p>
                                    “Great course experience, really helpful instructors! I
                                    finally understand async JavaScript.”
                                </p>
                                <div class="testimonial-footer">
                                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Jane Smith" />
                                    <div>
                                        <h4>Jane Smith</h4>
                                        <p>UI Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="reviews">
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                </div>
                                <p>
                                    “Excellent community and super‑practical content. Loved the
                                    real‑life projects.”
                                </p>
                                <div class="testimonial-footer">
                                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Ali Rahman" />
                                    <div>
                                        <h4>Ali Rahman</h4>
                                        <p>Digital Marketer</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="reviews">
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i><i
                                        class="fa-regular fa-star text-warning"></i>
                                    <i class="fa-regular fa-star text-warning"></i>
                                </div>
                                <p>
                                    “Good starting point for beginners. Would recommend the JS
                                    path.”
                                </p>
                                <div class="testimonial-footer">
                                    <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="Sara Khan" />
                                    <div>
                                        <h4>Sara Khan</h4>
                                        <p>Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- …add more slides if you like… -->
                    </div>

                    <!-- pagination bullets -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- Testimonials section end -->

    </main>
    
@endsection