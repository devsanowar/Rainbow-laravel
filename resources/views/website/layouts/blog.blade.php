@extends('website.layouts.app')
@section('title', 'Blog Page')
@section('website_content')
       <main>
        <!-- Blog Content -->
        <section class="blog-section">
            <div class="container">
                <div class="row">
                    <!-- Main Blog Content -->
                    <div class="col-lg-8">
                        <div class="row">
                            <!-- Blog Card 1 -->
                            <div class="col-md-6 mb-4 animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                                <div class="blog-card h-100">
                                    <img src="{{ asset('frontend') }}/assets//images/slider/ss-1.avif" class="blog-card-img w-100"
                                        alt="Blog Image">
                                    <div class="blog-card-body">
                                        <span class="blog-category">Business</span>
                                        <h3 class="blog-card-title"><a href="blogDetails.html">Global Market Trends in
                                                2023</a></h3>
                                        <p class="blog-card-text">Explore the emerging market trends that are shaping
                                            industries worldwide and how Rainbow Global is adapting to these changes.
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="blog-meta">
                                                <span><i class="far fa-calendar-alt"></i> June 15, 2023</span>
                                                <span><i class="far fa-eye"></i> 1.2K</span>
                                            </div>
                                            <a href="#" class="read-more">Read More <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog Card 2 -->
                            <div class="col-md-6 mb-4 animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                <div class="blog-card h-100">
                                    <img src="{{ asset('frontend') }}/assets//images/slider/ss-2.avif" class="blog-card-img w-100"
                                        alt="Blog Image">
                                    <div class="blog-card-body">
                                        <span class="blog-category">Technology</span>
                                        <h3 class="blog-card-title"><a href="blogDetails.html">Innovations Driving
                                                Digital Transformation</a></h3>
                                        <p class="blog-card-text">Discover how cutting-edge technologies are
                                            revolutionizing business operations and customer experiences across the
                                            globe.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="blog-meta">
                                                <span><i class="far fa-calendar-alt"></i> May 28, 2023</span>
                                                <span><i class="far fa-eye"></i> 2.4K</span>
                                            </div>
                                            <a href="#" class="read-more">Read More <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog Card 3 -->
                            <div class="col-md-6 mb-4 animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                                <div class="blog-card h-100">
                                    <img src="{{ asset('frontend') }}/assets//images/slider/ss-3.avif" class="blog-card-img w-100"
                                        alt="Blog Image">
                                    <div class="blog-card-body">
                                        <span class="blog-category">Sustainability</span>
                                        <h3 class="blog-card-title"><a href="blogDetails.html">Our Commitment to
                                                Environmental Responsibility</a></h3>
                                        <p class="blog-card-text">Learn about Rainbow Global's sustainability
                                            initiatives and how we're reducing our environmental footprint worldwide.
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="blog-meta">
                                                <span><i class="far fa-calendar-alt"></i> April 10, 2023</span>
                                                <span><i class="far fa-eye"></i> 1.8K</span>
                                            </div>
                                            <a href="#" class="read-more">Read More <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog Card 4 -->
                            <div class="col-md-6 mb-4 animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                                <div class="blog-card h-100">
                                    <img src="{{ asset('frontend') }}/assets//images/slider/ss-2.avif" class="blog-card-img w-100"
                                        alt="Blog Image">
                                    <div class="blog-card-body">
                                        <span class="blog-category">Leadership</span>
                                        <h3 class="blog-card-title"><a href="blogDetails.html">Building Inclusive Global
                                                Teams</a></h3>
                                        <p class="blog-card-text">Insights from our HR leaders on creating diverse and
                                            inclusive workplaces that drive innovation and performance.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="blog-meta">
                                                <span><i class="far fa-calendar-alt"></i> March 22, 2023</span>
                                                <span><i class="far fa-eye"></i> 1.5K</span>
                                            </div>
                                            <a href="#" class="read-more">Read More <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Blog pagination" class="mt-5 animate__animated animate__fadeIn">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Blog Sidebar -->
                    <div class="col-lg-4 animate__animated animate__fadeIn">
                        <!-- Search Widget -->
                        <div class="blog-sidebar mb-4">
                            <h4 class="sidebar-title">Search</h4>
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" placeholder="Search articles...">
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="blog-sidebar mb-4">
                            <h4 class="sidebar-title">Categories</h4>
                            <ul class="categories-list">
                                <li><a href="#">Business <span>12</span></a></li>
                                <li><a href="#">Technology <span>8</span></a></li>
                                <li><a href="#">Sustainability <span>5</span></a></li>
                                <li><a href="#">Leadership <span>7</span></a></li>
                                <li><a href="#">Global Markets <span>9</span></a></li>
                            </ul>
                        </div>

                        <!-- Popular Posts Widget -->
                        <div class="blog-sidebar mb-4">
                            <h4 class="sidebar-title">Popular Posts</h4>
                            <ul class="popular-posts">
                                <li>
                                    <div class="popular-post">
                                        <img src="{{ asset('frontend') }}/assets//images/slider/ss-1.avif" class="popular-post-img"
                                            alt="Popular Post">
                                        <div>
                                            <h5 class="popular-post-title">Global Expansion Strategies</h5>
                                            <p class="popular-post-date">June 5, 2023</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-post">
                                        <img src="{{ asset('frontend') }}/assets//images/slider/ss-2.avif" class="popular-post-img"
                                            alt="Popular Post">
                                        <div>
                                            <h5 class="popular-post-title">Future of Remote Work</h5>
                                            <p class="popular-post-date">May 18, 2023</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-post">
                                        <img src="{{ asset('frontend') }}/assets//images/slider/ss-3.avif" class="popular-post-img"
                                            alt="Popular Post">
                                        <div>
                                            <h5 class="popular-post-title">Green Office Initiatives</h5>
                                            <p class="popular-post-date">April 30, 2023</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Tags Widget -->
                        <div class="blog-sidebar">
                            <h4 class="sidebar-title">Tags</h4>
                            <div class="tags-container">
                                <a href="#" class="tag">#global</a>
                                <a href="#" class="tag">#innovation</a>
                                <a href="#" class="tag">#business</a>
                                <a href="#" class="tag">#technology</a>
                                <a href="#" class="tag">#sustainability</a>
                                <a href="#" class="tag">#leadership</a>
                                <a href="#" class="tag">#strategy</a>
                                <a href="#" class="tag">#growth</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main> 
@endsection