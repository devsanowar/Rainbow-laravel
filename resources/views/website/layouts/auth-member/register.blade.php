@extends('website.layouts.app')
@section('title', 'Member Register')
@section('website_content')
    <main>
        <div class="form-section">
            <div class="container">
                <div class="row justify-content-center mt-4 mb-3">
                    <div class="signup-container">
                        <div class="signup-header">
                            <img src="{{ asset($website_setting->website_logo) }}" class="img-fluid mx-auto mb-2"
                                style="height: 25px" alt="logo">
                            <h2>Member Registration </h2>
                            <!-- <p class="text-muted">Create your account</p> -->
                        </div>

                        <form method="POST" action="{{ route('member.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Sponsor Username -->
                                    <div class="mb-3">
                                        <label for="sponsor_username" class="form-label">Sponsor Username <small
                                                class="text-danger">*</small></label>
                                        <input type="text" class="form-control" id="sponsor_username"
                                            name="sponsor_username" placeholder="Enter your username"
                                            value="{{ old('sponsor_username') }}" required />
                                        @error('sponsor_username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <small
                                                class="text-danger">*</small></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Create a password" required />
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Full Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name <small
                                                class="text-danger">*</small></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter your full name" value="{{ old('name') }}" required />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Authentication Type -->
                                    <div class="mb-3">
                                        <label for="authentication_type" class="form-label">Authentication Type <small
                                                class="text-danger">*</small></label>
                                        <select class="form-select" id="authentication_type" name="authentication_type"
                                            onchange="updateAuthPlaceholder()" required>
                                            <option value="NID"
                                                {{ old('authentication_type') == 'NID' ? 'selected' : '' }}>NID Number
                                            </option>
                                            <option value="Birth"
                                                {{ old('authentication_type') == 'Birth' ? 'selected' : '' }}>Birth
                                                Registration Number</option>
                                            <option value="Passport"
                                                {{ old('authentication_type') == 'Passport' ? 'selected' : '' }}>Passport
                                                Number</option>
                                        </select>
                                        @error('authentication_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="mb-3">
                                        <label for="mobile_number" class="form-label">Phone Number <small
                                                class="text-danger">*</small></label>
                                        <input type="tel" class="form-control" id="mobile_number" name="mobile_number"
                                            placeholder="Enter your mobile number" value="{{ old('mobile_number') }}"
                                            required />
                                        @error('mobile_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Select Division -->
                                    <div class="mb-3">
                                        <label for="division_id" class="form-label">Select Division</label>
                                        <select id="division_id" name="division_id" class="form-select" required>
                                            <option value="">-- Select Division --</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}"
                                                    {{ old('division_id') == $division->id ? 'selected' : '' }}>
                                                    {{ $division->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Select Upazila -->
                                    <div class="mb-3">
                                        <label for="upazila_id" class="form-label">Select Upazila</label>
                                        <select id="upazila_id" name="upazila_id" class="form-select" required>
                                            <option value="">-- Select Upazila --</option>
                                        </select>
                                        @error('upazila_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Terms -->
                                    <div class="form-check terms-check">
                                        <input class="form-check-input" type="checkbox" id="termsCheck" name="termsCheck"
                                            {{ old('termsCheck') ? 'checked' : '' }} required />
                                        <label class="form-check-label" for="termsCheck">
                                            I accept the terms and conditions of use
                                        </label>
                                        @error('termsCheck')
                                            <br><small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Position -->
                                    <div class="mb-3">
                                        <label class="form-label d-block">Position</label>
                                        <div class="form-check form-check-inline"
                                            style="margin-top: 6px; margin-bottom:6px">
                                            <input class="form-check-input" type="radio" name="position" id="leftSide"
                                                value="left" {{ old('position') == 'left' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="leftSide">Left Side</label>
                                        </div>
                                        <div class="form-check form-check-inline"
                                            style="margin-top: 6px; margin-bottom:6px">
                                            <input class="form-check-input" type="radio" name="position"
                                                id="rightSide" value="right"
                                                {{ old('position') == 'right' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="rightSide">Right Side</label>
                                        </div>
                                        @error('position')
                                            <br><small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password <small
                                                class="text-danger">*</small></label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm your password" required>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth <small
                                                class="text-danger">*</small></label>
                                        <input type="date" class="form-control" id="date_of_birth"
                                            name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                        @error('date_of_birth')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Authentication Number -->
                                    <div class="mb-3">
                                        <label class="form-label">Authentication Number <small
                                                class="text-danger">*</small></label>
                                        <input type="text" class="form-control" id="authentication_number"
                                            name="authentication_number" placeholder="NID Number"
                                            value="{{ old('authentication_number') }}">
                                        @error('authentication_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter your email" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- District -->
                                    <div class="mb-3">
                                        <label for="district_id" class="form-label">Select District</label>
                                        <select id="district_id" name="district_id" class="form-select" required>
                                            <option value="">-- Select Zila --</option>
                                        </select>
                                        @error('district_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Union -->
                                    <div class="mb-3">
                                        <label for="union_id" class="form-label">Select Union</label>
                                        <select id="union_id" name="union_id" class="form-select" required>
                                            <option value="">-- Select Union --</option>
                                        </select>
                                        @error('union_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="rainbow-btn">Sign Up</button>
                            </div>
                        </form>


                        <div class="signin-link">
                            <p class="text-muted">
                                Already have an account? <a href="{{ route('member.loginForm') }}" class="text-primary">Login In</a>
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
        // Division change => Load districts
        $('#division_id').on('change', function() {
            var divisionID = $(this).val();
            if (divisionID) {
                $.get('/member/get-districts/' + divisionID, function(data) {
                    $('#district_id').empty().append('<option value="">-- Select Zila --</option>');
                    $('#upazila_id').empty().append('<option value="">-- Select Upazila --</option>');
                    $('#union_id').empty().append('<option value="">-- Select Union --</option>');

                    $.each(data, function(key, value) {
                        $('#district_id').append('<option value="' + value.id + '">' + value
                            .district_name + '</option>');
                    });
                });
            }
        });

        // District change => Load upazilas
        $('#district_id').on('change', function() {
            var districtID = $(this).val();
            if (districtID) {
                $.get('/member/get-upazilas/' + districtID, function(data) {
                    $('#upazila_id').empty().append('<option value="">-- Select Upazila --</option>');
                    $('#union_id').empty().append('<option value="">-- Select Union --</option>');

                    $.each(data, function(key, value) {
                        $('#upazila_id').append('<option value="' + value.id + '">' + value
                            .upazila_name + '</option>');
                    });
                });
            }
        });

        // Upazila change => Load unions
        $('#upazila_id').on('change', function() {
            var upazilaID = $(this).val();
            if (upazilaID) {
                $.get('/member/get-unions/' + upazilaID, function(data) {
                    $('#union_id').empty().append('<option value="">-- Select Union --</option>');

                    $.each(data, function(key, value) {
                        $('#union_id').append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                });
            }
        });
    </script>
@endpush
