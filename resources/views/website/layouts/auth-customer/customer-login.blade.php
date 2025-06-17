@extends('website.layouts.app')
@section('title', 'Customer login page')
@section('website_content')
    <main>
        <div class="form-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="signup-container">
                        <div class="signup-header">
                            <img src="{{ asset('frontend') }}/assets/images/logo/logo-main.png" class="img-fluid mx-auto mb-2" style="height: 25px"
                                alt="logo">
                            <h2>Sign In</h2>
                            <!-- <p class="text-muted">Create your account</p> -->
                        </div>

                        <form>
                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Username</label>
                                <input type="tel" class="form-control" id="mobileNumber" name="cus_username" 
                                    placeholder="Enter your mobile number" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Create a password" />
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="rainbow-btn">Sign In</button>
                            </div>
                        </form>

                        <div class="signin-link">
                            <p class="text-muted">
                                Already have an account? <a href="{{ route('customer.registerForm') }}" class="text-primary">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
