@extends('Template.master')
@section('shop')

<!-- Start Hero Section -->
<div class="hero animate__animated animate__fadeInDownBig">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt animate__animated animate__zoomIn">
                    <h1>Shop</h1>
                    <span style="color: #be9e9e;">
                        @if (@session('message'))
                            {{ @session('message') }}
                        @endif
                    </span>
                </div>
            </div>
            <div class="col-lg-7"></div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section animate__animated animate__fadeInUpBig">
    <div class="container">
        <div class="row">
            @foreach ($shop as $row)
                <div class="col-12 col-md-4 col-lg-3 mb-5 animate__animated animate__zoomIn animate__delay-1s">
                    <a href="#" class="product-item" data-bs-toggle="modal" data-bs-target="#productModal" 
                       data-name="{{ $row->name }}" 
                       data-price="{{ $row->price }}"
                       data-image="{{ asset('uploads/' . $row->images->pimg) }}"
                       data-description="{{ $row->description }}"
                       data-id="{{ $row->id }}">
                        <img src="{{ asset('uploads/' . $row->images->pimg) }}" class="img-fluid product-thumbnail" width="250" height="250">
                        <h3 class="product-title">{{ $row->name }}</h3>
                        <strong class="product-price">${{ $row->price }}</strong>

                        <span class="icon-cross">
                            <i class="fas fa-shopping-cart" style="color: white; position : relative; top : 5px;"></i>
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="width: 100%">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="productImage" src="" class="img-fluid rounded" alt="Product Image">
                    </div>
                    <div class="col-md-6">
                        <h3 id="productTitle"></h3>
                        <p id="productDescription" class="mb-4"></p>
                        <p><strong>Price: $<span id="productPrice"></span></strong></p>

                        <div class="d-flex justify-content-between">
                            <form id="wishlistForm" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger"><i class="fas fa-heart"></i> Add to Wishlist</button>
                            </form>&nbsp;&nbsp;
                            <form id="cartForm" method="POST">
                                @csrf
                                <button class="btn btn-success"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productModal = document.getElementById('productModal');

        productModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const name = button.getAttribute('data-name');
            const price = button.getAttribute('data-price');
            const image = button.getAttribute('data-image');
            const description = button.getAttribute('data-description');
            const id = button.getAttribute('data-id');

            const modalTitle = productModal.querySelector('#productTitle');
            const modalImage = productModal.querySelector('#productImage');
            const modalDescription = productModal.querySelector('#productDescription');
            const modalPrice = productModal.querySelector('#productPrice');
            const wishlistForm = productModal.querySelector('#wishlistForm');
            const cartForm = productModal.querySelector('#cartForm');

            // Update modal content
            modalTitle.textContent = name;
            modalImage.src = image;
            modalDescription.textContent = description;
            modalPrice.textContent = price;

            // Update the form actions with the product ID
            wishlistForm.action = `/storewishlist/${id}`;
            cartForm.action = `/cart/store/${id}`;
        });

        // Clear modal content when it's closed
        productModal.addEventListener('hidden.bs.modal', function () {
            const modalTitle = productModal.querySelector('#productTitle');
            const modalImage = productModal.querySelector('#productImage');
            const modalDescription = productModal.querySelector('#productDescription');
            const modalPrice = productModal.querySelector('#productPrice');

            // Reset content to prevent stale data
            modalTitle.textContent = '';
            modalImage.src = '';
            modalDescription.textContent = '';
            modalPrice.textContent = '';
        });
    });
</script>

@endsection
