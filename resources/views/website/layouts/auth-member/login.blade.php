@extends('website.layouts.app')
@section('title', 'Member Login Page')
@section('website_content')
    <main>
        <div class="form-section">
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="signup-container">
                        <div class="signup-header">
                            <img src="{{ asset($website_setting->website_logo) }}" class="img-fluid mx-auto mb-2"
                                style="height: 25px" alt="logo">
                            <h2>Member Login</h2>
                            <!-- <p class="text-muted">Create your account</p> -->
                        </div>

                        <form action="{{ route('member.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Username <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="mobileNumber" name="member_username"
                                    placeholder="Enter your username" />
                                @error('member_username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password <small
                                        class="text-danger">*</small></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter a password" />
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="rainbow-btn">Sign In</button>
                            </div>
                        </form>


                        <div class="signin-link">
                            <p class="text-muted">
                                Don't have an account? <a href="{{ route('member.registerForm') }}"
                                    class="text-primary">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
