@extends('website.layouts.app')
@section('title', 'Customer Register page')
@section('website_content')
    <main>
        <div class="form-section">
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="signup-container">
                        <div class="signup-header">
                            <img src="{{ asset('frontend') }}/assets/images/logo/logo-main.png" class="img-fluid mx-auto mb-2" style="height: 25px"
                                alt="logo">
                            <h2>Sign Up</h2>
                            <!-- <p class="text-muted">Create your account</p> -->
                        </div>

                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your full name" />
                            </div>

                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobileNumber" name="phone"
                                    placeholder="Enter your mobile number" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Create a password" />
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    placeholder="Confirm your password">
                            </div>

                            <div class="form-check terms-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" />
                                <label class="form-check-label" for="termsCheck">
                                    I accept the terms and conditions of use
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="rainbow-btn">Sign Up</button>
                            </div>
                        </form>

                        <div class="signin-link">
                            <p class="text-muted">
                                Already have an account? <a href="{{ route('customer.loginForm') }}" class="text-primary">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
