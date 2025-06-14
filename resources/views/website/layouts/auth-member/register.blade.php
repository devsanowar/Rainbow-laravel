@extends('website.layouts.app')
@section('title', 'Member Register')
@section('website_content')
    <main>
        <div class="form-section">
            <div class="container">
                <div class="row justify-content-center mt-4 mb-3">
                    <div class="signup-container">
                        <div class="signup-header">
                            <img src="assets/images/logo.png" class="img-fluid mx-auto mb-2" style="height: 60px"
                                alt="logo">
                            <h2>Member Registration </h2>
                            <!-- <p class="text-muted">Create your account</p> -->
                        </div>

                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter your full name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password <small class="text-danger"> *
                                            </small></label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Create a password" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="password"
                                            placeholder="Enter your email" />
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label for="" class="form-label">Authentication Type</label>
                                        <select name="" id="">
                                            <option value="NID">NID Number</option>
                                            <option value="Birth">Birth Registration Number</option>
                                            <option value="Birth">Passport Number</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Authentication Number</label>
                                        <input type="text" placeholder="NID">
                                        <input type="text" placeholder="Birth Registration Number">
                                        <input type="text" placeholder="Passport Number">
                                    </div> -->
                                    <div class="mb-3">
                                        <label for="authType" class="form-label">Authentication Type</label>
                                        <select class="form-select" id="authType" name="authType">
                                            <option value="NID" selected>NID Number</option>
                                            <option value="Birth">Birth Registration Number</option>
                                            <option value="Passport">Passport Number</option>
                                        </select>
                                    </div>

                                    <div class="form-check terms-check">
                                        <input class="form-check-input" type="checkbox" id="termsCheck" />
                                        <label class="form-check-label" for="termsCheck">
                                            I accept the terms and conditions of use
                                        </label>
                                    </div>
                                </div>
                                <!-- Colum Two Inputs -->
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="mobileNumber" class="form-label">Phone Number <small
                                                class="text-danger"> * </small></label>
                                        <input type="tel" class="form-control" id="mobileNumber"
                                            placeholder="Enter your mobile number" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password <small
                                                class="text-danger"> * </small></label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            placeholder="Confirm your password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dateOfBirth" class="form-label">Date of Birth <small
                                                class="text-danger"> * </small></label>
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                                            required>
                                        <!-- <small class="text-danger">You must be at least 18 years old</small> -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="authType" class="form-label">Authentication Number</label>
                                        <div id="authNumberContainer">
                                            <!-- Default shown field (NID) -->
                                            <input type="text" class="form-control" id="NIDNumber" name="authNumber"
                                                placeholder="NID Number">

                                            <!-- Hidden fields -->
                                            <input type="text" class="form-control d-none" id="BirthNumber"
                                                name="authNumber" placeholder="Birth Registration Number">
                                            <input type="text" class="form-control d-none" id="PassportNumber"
                                                name="authNumber" placeholder="Passport Number">
                                        </div>
                                    </div>


                                    <!-- <div class="form-check terms-check">
                                        <input class="form-check-input" type="checkbox" id="termsCheck" />
                                        <label class="form-check-label" for="termsCheck">
                                            I accept the terms and conditions of use
                                        </label>
                                    </div> -->
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your full name" />
                            </div>

                            <div class="mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobileNumber"
                                    placeholder="Enter your mobile number" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"
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
                            </div> -->

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
