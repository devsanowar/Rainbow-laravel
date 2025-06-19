<!-- checkout body content start -->
    <div class="chekout-cart-section">
        <div class="container-fluid py-5">
            <div class="row">
                <!-- Cart Table -->
                <div class="col-lg-8 mb-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover bg-white">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="assets/images/product/kids-shoes.png" class="product-img"
                                            alt="Product" />
                                    </td>
                                    <td>Vitamin D3</td>
                                    <td>Medium</td>
                                    <td>৳25</td>
                                    <td><input type="number" class="form-control form-control-sm" value="2" min="1">
                                    </td>
                                    <td>৳50</td>
                                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                                </tr>
                                <tr>
                                    <td><img src="assets/images/product/sports.png" class="product-img" alt="Product" />
                                    </td>
                                    <td>Omega-3 Fish Oil</td>
                                    <td>Large</td>
                                    <td>৳40</td>
                                    <td><input type="number" class="form-control form-control-sm" value="1" min="1">
                                    </td>
                                    <td>৳40</td>
                                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Checkout Summary -->
                <div class="col-lg-4">
                    <!-- Order Summary -->
                    <div class="card card-summary p-4 mb-4">
                        <h5 class="mb-3">Order Summary</h5>

                        <!-- Totals -->
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>৳90</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping</span>
                                <strong>৳5</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>৳95</strong>
                            </li>
                        </ul>

                        <!-- Checkout Button -->
                        <button class="marco-btn w-100" id="checkoutBtn">Proceed to Checkout</button>
                    </div>

                    <!-- Order Confirmation Form (Hidden by default) -->
                    <div class="card p-4" id="orderForm"
                        style="display: none; opacity: 0; transition: opacity 0.5s ease;">
                        <h5 class="mb-3">Place Your Order</h5>
                        <form id="orderConfirmForm">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter your full name"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="emailAddress" placeholder="you@example.com"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber" placeholder="+8801XXXXXXXXX"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label for="shippingAddress" class="form-label">Shipping Address</label>
                                <textarea class="form-control" id="shippingAddress" rows="3"
                                    placeholder="Your delivery address..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Payment Method</label>
                                <select class="form-select" id="paymentMethod" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option value="cod">Cash on Delivery</option>
                                    <option value="bkash">bKash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="card">Credit/Debit Card</option>
                                </select>
                            </div>

                            <button type="submit" class="marco-btn w-100">Confirm & Place Order</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
