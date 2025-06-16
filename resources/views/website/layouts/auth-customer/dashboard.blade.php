<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            padding: 15px;
            display: block;
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar a:hover {
            background-color: #f1f1f1;
            color: #007bff;
        }

        .topbar {
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-0">
                <div class="p-4">
                    <h4 class="mb-4">Welcome, John</h4>
                    <a href="#">🛒 Orders</a>
                    <a href="#">❤️ Wishlist</a>
                    <a href="#">👤 Profile</a>
                    <a href="#">🔒 Change Password</a>
                    <a href="#">🚪 Logout</a>
                    <form action="{{ route('customer.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <!-- Top Bar -->
                <div class="topbar d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Customer Dashboard</h5>
                    <span class="text-muted">Last login: May 31, 2025</span>
                </div>

                <!-- Content Area -->
                <div class="content">
                    <div class="row g-4">
                        <!-- Orders Card -->
                        <div class="col-md-4">
                            <div class="card p-4">
                                <h6>Total Orders</h6>
                                <h3>12</h3>
                            </div>
                        </div>

                        <!-- Wishlist Card -->
                        <div class="col-md-4">
                            <div class="card p-4">
                                <h6>Wishlist Items</h6>
                                <h3>5</h3>
                            </div>
                        </div>

                        <!-- Profile Info Card -->
                        <div class="col-md-4">
                            <div class="card p-4">
                                <h6>Profile Status</h6>
                                <h3 class="text-success">Complete</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders Table -->
                    <div class="card mt-5 p-4">
                        <h5 class="mb-3">Recent Orders</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1001</td>
                                    <td>2025-05-30</td>
                                    <td>৳1,250</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                </tr>
                                <tr>
                                    <td>#1002</td>
                                    <td>2025-05-28</td>
                                    <td>৳850</td>
                                    <td><span class="badge bg-warning text-dark">Processing</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
