<tr id="cart-item-{{ $cartItem['id'] }}" data-id="{{ $cartItem['id'] }}">
    <td>
        <img src="{{ asset($cartItem['thumbnail']) }}" class="product-img" alt="Product" width="50" />
    </td>
    <td>{{ $cartItem['name'] }}</td>

    {{-- Points --}}
    <td class="cart-points">
        {{ number_format(($cartItem['points'] ?? 0) * $cartItem['quantity'], 2) }}
    </td>

    {{-- Single unit price --}}
    <td class="unit-price" data-price="{{ $cartItem['price'] }}">
        {{ number_format($cartItem['price'], 2) }} Tk
    </td>

    {{-- Quantity control --}}
    <td>
        <button class="btn btn-sm btn-outline-secondary cart-minus" data-action="decrease" data-id="{{ $cartItem['id'] }}">-</button>
        <input type="number"
            class="form-control form-control-sm cart-qty d-inline-block w-25 text-center"
            value="{{ $cartItem['quantity'] }}" readonly>
        <button class="btn btn-sm btn-outline-secondary cart-plus" data-action="increase" data-id="{{ $cartItem['id'] }}">+</button>
    </td>

    {{-- Line total (unit price * quantity) --}}
    <td class="cart_item_price">
        {{ number_format($cartItem['price'] * $cartItem['quantity'], 2) }} Tk
    </td>

    {{-- Remove button --}}
    <td class="product-remove">
        <button class="remove-button btn btn-sm btn-danger remove-from-cart" data-id="{{ $cartItem['id'] }}">
            <i class="fa fa-times"></i>
        </button>
    </td>
</tr>
