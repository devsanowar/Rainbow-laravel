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
                                <th scope="col">Name</th>
                                <th scope="col">Points</th>
                                <th scope="col">Price</th>
                                <th style="width: 250px" scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cartBody">
                            @forelse ($cartContents as $productId => $cartItem)
                                <tr id="cart-item-{{ $productId }}" data-id="{{ $productId }}">
                                    <td>
                                        <img src="{{ asset($cartItem['thumbnail']) }}" class="product-img"
                                            alt="Product" width="50" />
                                    </td>
                                    <td>{{ $cartItem['name'] }}</td>

                                    {{-- Points --}}
                                    <td class="cart-points">
                                        {{ number_format(($cartItem['points'] ?? 0) * $cartItem['quantity'], 2) }}
                                    </td>

                                    {{-- Single unit price --}}
                                    <td>{{ number_format($cartItem['price'], 2) }} Tk</td>

                                    {{-- Quantity control --}}
                                    <td>
                                        <button class="btn btn-sm btn-outline-secondary cart-minus"
                                            data-action="decrease">-</button>
                                        <input type="number"
                                            class="form-control form-control-sm cart-qty d-inline-block w-25 text-center"
                                            value="{{ $cartItem['quantity'] }}" readonly>
                                        <button class="btn btn-sm btn-outline-secondary cart-plus"
                                            data-action="increase">+</button>
                                    </td>

                                    {{-- Line total (unit price * quantity) --}}
                                    <td class="cart_item_price">
                                        {{ number_format($cartItem['price'] * $cartItem['quantity'], 2) }} Tk
                                    </td>

                                    {{-- Remove button --}}
                                    <td class="product-remove">
                                        <button class="remove-button btn btn-sm btn-danger remove-from-cart"
                                            data-id="{{ $productId }}">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Cart is empty</td>
                                </tr>
                            @endforelse
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
                            <strong class="cart-subtotal">৳{{ number_format($totalAmount, 2) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong class="cart-total">৳{{ number_format($totalAmount, 2) }}</strong>
                        </li>
                    </ul>

                    <!-- Checkout Button -->
                    <button class="marco-btn w-100" id="checkoutBtn">Proceed to Checkout</button>
                </div>

                <!-- Order Confirmation Form (Hidden by default) -->
                <div class="card p-4" id="orderForm" style="display: none; opacity: 0; transition: opacity 0.5s ease;">
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
                            <textarea class="form-control" id="shippingAddress" rows="3" placeholder="Your delivery address..." required></textarea>
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


@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.remove-from-cart', function(e) {
            e.preventDefault();

            let id = $(this).data('id');

            if (!confirm('Are you sure?')) return;

            $.ajax({
                url: "{{ route('removefrom.cart') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    // Remove the product row
                    $('#cart-item-' + id).remove();

                    // ✅ Update total/subtotal amount
                    $('.cart-subtotal').text('৳' + response.totalAmount);
                    $('.cart-total').text('৳' + response.totalAmount);

                    // ✅ Update cart count (optional if used)
                    $('#cart-count').text(response.itemCount);

                    toastr.success(response.message);
                },
                error: function() {
                    toastr.error('Something went wrong');
                }
            });
        });
    });
</script>



    <script>
        $(document).on('click', '.cart-minus, .cart-plus', function(e) {
            e.preventDefault();

            let $btn = $(this);
            let $row = $btn.closest('tr');
            let productId = $row.data('id');
            let action = $btn.data('action');

            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    action: action,
                },
                success: function(response) {
                    if (response.success) {
                        $row.find('.cart-qty').val(response.quantity);
                        $row.find('.cart-price').text('৳' + response.subtotal);
                        $row.find('.cart-points').text(response.subtotalPoints);
                        $row.find('.cart_item_price').text(response.itemTotal +
                        ' Tk'); // ✅ Update item line total

                        // Update cart total values
                        $('.cart-subtotal').text('৳' + response.totalAmount);
                        $('.cart-total').text('৳' + response.totalAmount);
                        $('#cart-count').text(response.itemCount);
                    }
                },
                error: function() {
                    toastr.error('Something went wrong!');
                }
            });
        });
    </script>
@endpush
