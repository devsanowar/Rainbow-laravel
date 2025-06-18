<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rainbow Global</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/icons/favicon.ico" type="image/x-icon" />

    @include('website.layouts.auth-member.dashboard.inc.style')

</head>

<body>

    <!-- Sidebar -->
    @include('website.layouts.auth-member.dashboard.inc.sidebar')

    <!-- Content -->
    <main class="content" id="main-content">
        <div class="dashboard-menu-bar d-flex justify-content-between align-items-center shadow px-4 py-2 text-white">
            <div class="dashboard-logo">
                <h4 class="mb-0">Dashboard</h4>
            </div>

            <div class="d-flex align-items-center gap-3">
                @if (Auth::check() && Auth::user()->system_admin === \App\Models\User::ROLE_MEMBER)
                    <span class="user-name fw-semibold">{{ Auth::user()->name }}</span>
                @else
                    <span class="user-name fw-semibold">Guest</span>
                @endif

                <div class="dropdown">
                    <div class="d-flex align-items-center gap-2 dropdown-toggle" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('frontend') }}/assets/images/a-4.avif" alt="Profile" class="rounded-circle"
                            width="40" height="40">
                        <i class="fas fa-chevron-down text-white"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li>
                            <form action="{{ route('member.logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item"
                                    style="background: none; border: none; padding:0 10px; margin: 0; width: 100%; text-align: left;"><i
                                        class="fas fa-sign-out-alt me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-body-content">
            <!-- Sections -->
            <div id="myProfile" class="content-section">
                <h2>My Profile</h2>
                <p>hello</p>
            </div>

            <div id="updateProfile" class="content-section d-none">
                <h2>Update Profile</h2>
                <p>Update your contact info, password, and other details.</p>
            </div>

            <div id="bankInfo" class="content-section d-none">
                <h2>Bank Information</h2>
                <p>Manage your bank details.</p>
            </div>

            <div id="teamMembers" class="content-section d-none">
                <h2>Team Members</h2>
                <p>View your downline team members.</p>
            </div>

            <div id="generation" class="content-section d-none">
                <h2>Generation</h2>
                <p>Explore your generational structure.</p>
            </div>

            <div id="shop" class="content-section d-none">
                @include('website.layouts.auth-member.dashboard.pages.products')
            </div>

            <div id="wallet" class="content-section d-none">
                <h2>Wallet</h2>
                <p>Track your earnings and transactions.</p>
            </div>

            <div id="reports" class="content-section d-none">
                <h2>Reports</h2>
                <p>Generate performance and transaction reports.</p>
            </div>
        </div>
    </main>

    @include('website.layouts.auth-member.dashboard.inc.script')
    

</body>

</html>
