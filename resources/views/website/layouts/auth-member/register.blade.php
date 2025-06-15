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
                                                class="text-danger"> *</small></label>
                                        <input type="text" class="form-control" id="sponsor_username"
                                            name="sponsor_username" placeholder="Enter your username" required />
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <small class="text-danger">
                                                *</small></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Create a password" required />
                                    </div>

                                    <!-- Full Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name <small class="text-danger">
                                                *</small></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter your full name" required />
                                    </div>

                                    <!-- Authentication Type -->
                                    <div class="mb-3">
                                        <label for="authentication_type" class="form-label">Authentication Type</label>
                                        <select class="form-select" id="authentication_type" name="authentication_type">
                                            <option value="NID" selected>NID Number</option>
                                            <option value="Birth">Birth Registration Number</option>
                                            <option value="Passport">Passport Number</option>
                                        </select>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="mb-3">
                                        <label for="mobile_number" class="form-label">Phone Number <small
                                                class="text-danger"> * </small></label>
                                        <input type="tel" class="form-control" id="mobile_number" name="mobile_number"
                                            placeholder="Enter your mobile number" required />
                                    </div>

                                    <!-- Select Division -->
                                    <div class="mb-3">
                                        <label for="division_id" class="form-label">Select Division</label>
                                        <select id="division_id" name="division_id" class="form-select" required>
                                            <option value="">-- Select Division --</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Select Upzila -->
                                    <div class="mb-3">
                                        <label for="upazila_id" class="form-label">Select Upazila</label>
                                        <select id="upazila_id" name="upazila_id" class="form-select" required>
                                            <option value="">-- Select Upazila --</option>
                                        </select>
                                    </div>

                                    <!-- Terms -->
                                    <div class="form-check terms-check">
                                        <input class="form-check-input" type="checkbox" id="termsCheck" name="termsCheck"
                                            required />
                                        <label class="form-check-label" for="termsCheck">
                                            I accept the terms and conditions of use
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Position -->
                                    <div class="mb-3">
                                        <label class="form-label d-block">Position</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="position" id="leftSide"
                                                value="left" required>
                                            <label class="form-check-label" for="leftSide">Left Side</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="position" id="rightSide"
                                                value="right">
                                            <label class="form-check-label" for="rightSide">Right Side</label>
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password <small
                                                class="text-danger"> * </small></label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm your password" required>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth <small
                                                class="text-danger"> * </small></label>
                                        <input type="date" class="form-control" id="date_of_birth"
                                            name="date_of_birth" required>
                                    </div>

                                    <!-- Authentication Number -->
                                    <div class="mb-3">
                                        <label class="form-label">Authentication Number</label>
                                        <div id="authNumberContainer">
                                            <input type="text" class="form-control" id="NIDNumber"
                                                name="authentication_number" placeholder="NID Number">
                                            <input type="text" class="form-control d-none" id="BirthNumber"
                                                name="authentication_number" placeholder="Birth Registration Number">
                                            <input type="text" class="form-control d-none" id="PassportNumber"
                                                name="authentication_number" placeholder="Passport Number">
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter your email">
                                    </div>

                                    <!-- District -->
                                    <div class="mb-3">
                                        <label for="district_id" class="form-label">Select District</label>
                                        <select id="district_id" name="district_id" class="form-select" required>
                                            <option value="">-- Select Zila --</option>
                                        </select>
                                    </div>

                                    <!-- Union -->
                                    <div class="mb-3">
                                        <label for="union_id" class="form-label">Select Union</label>
                                        <select id="union_id" name="union_id" class="form-select" required>
                                            <option value="">-- Select Union --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="rainbow-btn">Sign Up</button>
                            </div>
                        </form>


                        <div class="signin-link">
                            <p class="text-muted">
                                Already have an account? <a href="memberLogin.html" class="text-primary">Login In</a>
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
        $('#division').on('change', function() {
            var divisionID = $(this).val();
            if (divisionID) {
                $.get('/get-districts/' + divisionID, function(data) {
                    $('#district').empty().append('<option value="">-- সিলেক্ট জেলা --</option>');
                    $('#upazila').empty().append('<option value="">-- সিলেক্ট উপজেলা --</option>');
                    $('#union').empty().append('<option value="">-- সিলেক্ট ইউনিয়ন --</option>');
                    $.each(data, function(key, value) {
                        $('#district').append('<option value="' + value.id + '">' + value
                            .district_name + '</option>');
                    });
                });
            }
        });

        $('#district').on('change', function() {
            var districtID = $(this).val();
            if (districtID) {
                $.get('/get-upazilas/' + districtID, function(data) {
                    $('#upazila').empty().append('<option value="">-- সিলেক্ট উপজেলা --</option>');
                    $('#union').empty().append('<option value="">-- সিলেক্ট ইউনিয়ন --</option>');
                    $.each(data, function(key, value) {
                        $('#upazila').append('<option value="' + value.id + '">' + value
                            .upazila_name + '</option>');
                    });
                });
            }
        });

        $('#upazila').on('change', function() {
            var upazilaID = $(this).val();
            if (upazilaID) {
                $.get('/get-unions/' + upazilaID, function(data) {
                    $('#union').empty().append('<option value="">-- সিলেক্ট ইউনিয়ন --</option>');
                    $.each(data, function(key, value) {
                        $('#union').append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                });
            }
        });
    </script>
@endpush
