@extends('website.layouts.app')
@section('title', 'Customer Register page')
@section('website_content')
    <main>
        <div class="form-section">
            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="signup-container">
                        <div class="signup-header">
                            <img src="{{ asset('frontend') }}/assets/images/logo/logo-main.png" class="img-fluid mx-auto mb-2"
                                style="height: 25px" alt="logo">
                            <h2>Sign Up</h2>
                            <!-- <p class="text-muted">Create your account</p> -->
                        </div>

                        <form method="POST" action="">
                            @csrf

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('cus_username') is-invalid @enderror"
                                    id="username" name="cus_username" value="{{ old('cus_username') }}"
                                    placeholder="Enter your username" />
                                @error('cus_username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Full Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Enter your full name" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mobile Number -->
                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="mobileNumber" name="phone" value="{{ old('phone') }}"
                                    placeholder="Enter your mobile number" />
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Create a password" />
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fa-solid fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                    id="confirmPassword" name="confirm_password" placeholder="Confirm your password" />
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Terms Checkbox -->
                            <div class="form-check terms-check mb-3">
                                <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox"
                                    id="termsCheck" name="terms" {{ old('terms') ? 'checked' : '' }}>
                                <label class="form-check-label" for="termsCheck">
                                    I accept the terms and conditions of use
                                </label>
                                @error('terms')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="rainbow-btn">Sign Up</button>
                            </div>
                        </form>


                        <div class="signin-link">
                            <p class="text-muted">
                                Already have an account? <a href="{{ route('customer.loginForm') }}"
                                    class="text-primary">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', function () {
        const isPassword = password.type === 'password';
        password.type = isPassword ? 'text' : 'password';

        // Toggle between eye and eye-slash icons
        toggleIcon.classList.toggle('fa-eye');
        toggleIcon.classList.toggle('fa-eye-slash');
    });
</script>

@endpush
