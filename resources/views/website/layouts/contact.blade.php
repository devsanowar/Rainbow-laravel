@extends('website.layouts.app')
@section('title', 'Contact page')
@section('website_content')
  <main>
        <!-- Contact Section Start -->
        <section class="contact-section">
            <div class="container">
                <div class="row gy-4">
                    <!-- Contact Information -->
                    <div class="col-lg-6">
                        <h5 class="fw-bold mb-2">Contact Information</h5>
                        <p class="text-muted mb-4">Fill the form below or write us. We will help you as soon as
                            possible.</p>

                        <div class="mb-3 p-4 rounded bg-light-pink d-flex align-items-start gap-3 shadow-sm">
                            <i class="fa-solid fa-phone fa-2x text-warning"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Phone</h6>
                                <p class="mb-0">+(323) 9847 3847 383</p>
                                <p>+(434) 5466 5467 443</p>
                            </div>
                        </div>

                        <div class="mb-3 p-4 rounded bg-light-blue d-flex align-items-start gap-3 shadow-sm">
                            <i class="fa-solid fa-envelope fa-2x text-warning"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <p class="mb-0">Demoemail@gmail.com</p>
                                <p>rafiqulisamsuvobd@gmail.com</p>
                            </div>
                        </div>

                        <div class="p-4 rounded bg-light-green shadow-sm">
                            <div class="d-flex align-items-start gap-3 mb-2">
                                <i class="fa-solid fa-location-dot fa-2x text-warning"></i>
                                <div>
                                    <h6 class="fw-bold mb-1">Address</h6>
                                    <p class="mb-0">4517 Washington Ave. Manchester, Road 2342,<br> Kentucky 39495
                                    </p>
                                </div>
                            </div>
                            <div>
                                <iframe
                                    src="https://maps.google.com/maps?q=New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    width="100%" height="180" class="rounded border-0"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-6">
                        <div class="p-4 bg-white rounded shadow-sm h-100">
                            <h4 class="fw-bold mb-3 position-relative contact-title">Get In Touch</h4>
                            <form id="contactForm" novalidate>
                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name </label>
                                    <input type="text" class="form-control" id="name" placeholder="Demo Name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address <span
                                            class="text-danger">*</span> </label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="info@quomodosoft.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject </label>
                                    <input type="text" class="form-control" id="subject" placeholder="Your Subject here"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" rows="4"
                                        placeholder="Type your message here" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark w-100">Send Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>  
@endsection