<nav class="sidebar d-flex flex-column p-3">
        <h4 class="text-white mb-4">
            <a href="{{ route('home') }}" target="_blank">
                <img src="{{ asset($website_setting->website_logo) }}" alt="Rainbow Global Logo" class="img-fluid"
                    style="height: 25px;">
            </a>
        </h4>
        <ul class="nav nav-pills flex-column mb-auto">

            <!-- Account -->
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#accountMenu" role="button" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> Account <i class="fa-solid fa-chevron-down float-end"></i>
                </a>
                <div class="collapse" id="accountMenu">
                    <ul class="list-unstyled dropdown-menu-sidebar">
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('myProfile')">
                                <i class="fas fa-angle-right me-2"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('updateProfile')">
                                <i class="fas fa-angle-right me-2"></i> Update Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('bankInfo')">
                                <i class="fas fa-angle-right me-2"></i> Bank Information
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('bankInfo')">
                                <i class="fas fa-angle-right me-2"></i> Nominee Information
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('bankInfo')">
                                <i class="fas fa-angle-right me-2"></i> Change Password
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('bankInfo')">
                                <i class="fas fa-angle-right me-2"></i> Wallet Password
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

            <!-- Network -->
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#networkMenu" role="button" aria-expanded="false">
                    <i class="fa-solid fa-network-wired"></i> Network <i class="fa-solid fa-chevron-down float-end"></i>
                </a>
                <div class="collapse" id="networkMenu">
                    <ul class="list-unstyled dropdown-menu-sidebar">
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Genealogy
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Sponsor Members
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Team Members
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('generation')">
                                <i class="fas fa-angle-right me-2"></i> Generation
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
            <!-- Shop -->
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#shopMenu" role="button" aria-expanded="false">
                    <i class="fa-solid fa-store"></i> Shop <i class="fa-solid fa-chevron-down float-end"></i>
                </a>
                <div class="collapse" id="shopMenu">
                    <ul class="list-unstyled dropdown-menu-sidebar">
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Urgent Account
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('shop')">
                                <i class="fas fa-angle-right me-2"></i> Purchase
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Offer Product
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('cartPage')">
                                <i class="fas fa-angle-right me-2"></i> Cart
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
            <!-- Wallet -->
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#walletMenu" role="button" aria-expanded="false">
                    <i class="fa-solid fa-wallet"></i> Wallet <i class="fa-solid fa-chevron-down float-end"></i>
                </a>
                <div class="collapse" id="walletMenu">
                    <ul class="list-unstyled dropdown-menu-sidebar">
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Wallet Information
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Upload Photo
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Withdrow Balance
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
            <!-- Reports -->
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#reportsMenu" role="button" aria-expanded="false">
                    <i class="fa-solid fa-wallet"></i> Reports <i class="fa-solid fa-chevron-down float-end"></i>
                </a>
                <div class="collapse" id="reportsMenu">
                    <ul class="list-unstyled dropdown-menu-sidebar">
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Sponsor Bonus Report
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Team Sales Commission Reports
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link" onclick="showContent('teamMembers')">
                                <i class="fas fa-angle-right me-2"></i> Leadership Performance Bonus Reports
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

            <!-- Reports -->
            <li><a href="#" class="nav-link" onclick="showContent('reports')"><i class="fa-solid fa-chart-line"></i>
                    Reports</a></li>
        </ul>
    </nav>