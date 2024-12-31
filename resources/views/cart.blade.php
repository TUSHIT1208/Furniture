@extends('Template.master')

@section('cart')
<!-- Start Hero Section -->
<div class="hero animate-fade-in">
  <div class="container text-center animate-slide-from-bottom">
    <h1 class="hero-title animate-zoom-in">Shopping Cart</h1>
    @if (@session('message'))
        <p class="animate-bounce-in">{{ @session('message') }}</p>
    @endif
  </div>
</div>
<!-- End Hero Section -->

@if ($cartData == null)
<div class="empty-cart text-center">
    <img src="{{ asset('images/empty_cart.png') }}" alt="Empty Cart" class="empty-cart-image animate-zoom-in" width="250" height="250">
    <p class="empty-cart-message animate-slide-from-left">Your cart is currently empty; browse our collection to add items!</p>
    <a href="/shop" class="btn btn-primary animate-wiggle">Go to Shop</a>
</div>
@else
<div class="container cart-container animate-slide-from-left">
    @csrf
    <div class="site-blocks-table animate-fade-in">
      <table class="table table-bordered">
        <thead>
          <tr class="animate-slide-from-bottom">
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <form id="cart-form" action="/update_final_amount/" method="POST">
          @foreach ($productData as $data)
          <tr class="cart-item animate-slide-up">
            <td class="product-name">{{ $data->name }}</td>
            <td>
              <img src="{{ asset('uploads/'. $data->images->pimg) }}" class="product-image animate-fade-in" alt="{{ $data->name }}" width="100" height="100" style="object-fit: contain;">
            </td>
            <td class="product-price" data-price="{{ $data->price }}">${{ $data->price }}</td>
            <td>
              <div class="quantity-controls animate-bounce-in">
                <button type="button" class="decrease btn btn-outline-secondary" data-id="{{ $data->id }}">-</button>
                <input type="number" class="quantity-amount" name="quantity[{{ $data->id }}]" value="{{ $cartData[$data->id]->qty ?? 1 }}" min="1" style="background: transparent; border: none; text-align: center; outline: none;">
                <button type="button" class="increase btn btn-outline-secondary" data-id="{{ $data->id }}">+</button>
              </div>
            </td>
            <td class="total-price">${{ $data->price * ($cartData[$data->id]->qty ?? 1) }}</td>
            <td>
              <form action="/removecart/{{ $data->id }}" method="POST">
                @csrf
                <button type="submit" class="remove-item btn btn-danger">Remove</button>
              </form>
            </td>
          </tr>
          @endforeach
        </form>
        </tbody>
      </table>
    </div>

  <!-- Cart Footer Section -->
  <div class="cart-footer d-flex justify-content-between animate-slide-from-bottom">
    <a href="/shop" class="btn btn-outline-primary btn-continue animate-bounce-in">Continue Shopping</a>
    <span class="cart-subtotal" id="cart-subtotal">Subtotal: $0.00</span> 
      <a href="/checkout" class="btn btn-primary btn-cart animate-zoom-in">Proceed To Checkout</a>
  </div>
</div>
@endif

<!-- JavaScript for Real-Time Cart Updates -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const updateCartTotal = () => {
      let subtotal = 0;
      document.querySelectorAll('tbody tr').forEach(row => {
        const price = parseFloat(row.querySelector('.product-price').getAttribute('data-price'));
        const quantity = parseInt(row.querySelector('.quantity-amount').value);
        const total = price * quantity;
        row.querySelector('.total-price').textContent = `$${total.toFixed(2)}`;
        subtotal += total;
      });

      // Update the Subtotal in the cart footer
      document.querySelector('#cart-subtotal').textContent = `Subtotal: $${subtotal.toFixed(2)}`;
    };

    document.querySelectorAll('.quantity-amount').forEach(input => {
      input.addEventListener('change', (e) => {
        if (e.target.value < 1) e.target.value = 1;
        updateCartTotal();
        updateCart(e.target);  // Update the backend cart after changing quantity
      });
    });

    document.querySelectorAll('.increase').forEach(btn => {
      btn.addEventListener('click', () => {
        const input = btn.closest('.quantity-controls').querySelector('.quantity-amount');
        input.value = parseInt(input.value) + 1;
        input.dispatchEvent(new Event('change'));
      });
    });

    document.querySelectorAll('.decrease').forEach(btn => {
      btn.addEventListener('click', () => {
        const input = btn.closest('.quantity-controls').querySelector('.quantity-amount');
        input.value = Math.max(1, parseInt(input.value) - 1);
        input.dispatchEvent(new Event('change'));
      });
    });

    // AJAX update cart
    function updateCart(input) {
      const productId = input.name.split('[')[1].split(']')[0]; // Extract product id from name attribute
      const quantity = input.value;

      fetch(`/cart/update/${productId}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ quantity: quantity })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          updateCartTotal();
        } else {
          alert('Something went wrong while updating the cart!');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }

    // Initial total calculation on page load
    updateCartTotal();
  });
</script>

@endsection