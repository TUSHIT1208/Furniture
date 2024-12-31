@extends('Template.master')
@section('wishlist')
        <style>
            /* Basic reset and layout */
    body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    }

    .wishlist-container {
    width: 80%;
    max-width: 1200px;
    margin: 30px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
    text-align: center;
    color: #333;
    font-size: 2em;
    margin-bottom: 20px;
    }

    .wishlist-item {
    display: flex;
    flex-direction: column;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .wishlist-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .product-image {
    width: 100%;
    max-width: 200px;
    height: auto;
    margin: 0 auto 15px;
    border-radius: 8px;
    transition: transform 0.3s ease;
    }

    .product-image:hover {
    transform: scale(1.1);
    }

    .product-details {
    margin-bottom: 15px;
    }

    .product-name {
    font-size: 1.2em;
    color: #333;
    margin-bottom: 5px;
    transition: color 0.3s ease;
    }

    .product-price {
    font-size: 1.1em;
    color: #4CAF50;
    font-weight: bold;
    }

    .product-actions {
    display: flex;
    justify-content: space-between;
    }

    .add-to-cart,
    .remove-item {
    padding: 10px 20px;
    font-size: 1em;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .add-to-cart {
    background-color: #4CAF50;
    }

    .remove-item {
    background-color: #f44336;
    }

    .add-to-cart:hover {
    background-color: #45a049;
    transform: translateY(-3px);
    }

    .remove-item:hover {
    background-color: #d32f2f;
    transform: translateY(-3px);
    }

    /* Additional Animation Effects */
    .product-actions button:active {
    transform: translateY(2px);
    }

    .wishlist-item {
    opacity: 0;
    animation: fadeIn 0.5s ease-in-out forwards;
    }

    .wishlist-item:nth-child(odd) {
    animation-delay: 0.2s;
    }

    .wishlist-item:nth-child(even) {
    animation-delay: 0.4s;
    }

    @keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
    }
    /* Basic Styles */
.wishlist-item {
    position: relative;
    height: 243px;
}

.product-details {
    position: absolute;
    bottom: 57px;
    left: 10px;
    color: white;
}

.product-actions {
    position: absolute;
    bottom: 190px;
    right: 10px;
}

/* Social Icons Styling */
.social-icons {
    position: absolute;
    bottom: -100px; /* Start off-screen */
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
    opacity: 0; /* Hidden initially */
    transition: bottom 0.3s ease, opacity 0.3s ease;
}

/* Style for each social icon */
.social-icon {
    background: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    color: white;
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.social-icon p {
    font-size: 12px;
    margin-top: 5px;
}

.social-icon i {
    font-size: 20px;
}

/* Hover Effect */
.wishlist-item:hover .social-icons {
    bottom: 10px; /* Bring icons up */
    opacity: 1; /* Make them visible */
}

.social-icon:hover {
    transform: scale(1.1); /* Slightly enlarge the icons on hover */
}

.empty-wishlist-container {
    animation-duration: 2s;
    animation-timing-function: ease-in-out;
}

.empty-wishlist-container .animate__zoomIn {
    animation-duration: 1.5s;
    animation-timing-function: ease-out;
}

.empty-wishlist-container .animate__bounceInUp {
    animation-duration: 1.5s;
    animation-timing-function: ease-in;
}

.empty-wishlist-container .animate__fadeInUp {
    animation-duration: 1.5s;
    animation-timing-function: ease-in-out;
}

/* Add a custom animation */
@keyframes bounceInUp {
    0% {
        transform: translateY(50px);
        opacity: 0;
    }
    60% {
        transform: translateY(-10px);
        opacity: 1;
    }
    80% {
        transform: translateY(5px);
    }
    100% {
        transform: translateY(0);
    }
}

.animate__bounceInUp {
    animation: bounceInUp 1s ease-out;
}

    </style>
        @if ($wishlistData == null)
            <div class="empty-wishlist-container text-center my-5 animate__animated animate__fadeInUp">
                <img src="{{ asset('images/unnamed.png') }}" alt="Wishlist Image" width="250" height="250" class="animate__animated animate__bounceInUp">
                <p class="mt-3 animate__animated animate__zoomIn">You have no products in your wishlist.</p>
            </div>        
        @else       
            @foreach ($productData as $row)
            <div class="wishlist-item container mt-5" style="position: relative;">
                <img src="{{ asset('uploads/'. $row->images->pimg) }}" alt="Product 1" class="product-image mt-4" style="object-fit: cover;">
                
                <div class="product-details">
                    <h3 class="product-name">Brand : {{ $row->name }}</h3>
                    <p class="product-price">Price : ${{ $row->price }}</p>
                </div>

                <h3 class="product-price mt-2">Discount : {{ $row->discount }}</h3>
                <div class="product-actions">
                    <i class="fas fa-cart-plus add-to-cart" style="background : #3b5d50db; position : relative; right : 13%;"></i>
                    <form action="/remove_wishlist/{{ $row->id }}" method="POST">
                        @csrf
                        <button style="background: transparent; border : none;"><i class="fas fa-trash-alt remove-item" style="background : #3b5d50db;"></i></button>
                    </form>
                    
                </div>

                <!-- Social Icons Section with Hover Effect -->
                <div class="social-icons">
                    <div class="social-icon amazon">
                        <i class="fab fa-amazon"></i>
                        <p>Amazon</p>
                    </div>
                    <div class="social-icon flipkart">
                        <i class="fab fa-flipboard"></i>
                        <p>Flipkart</p>
                    </div>
                    <div class="social-icon meesho">
                        <i class="fab fa-google"></i>
                        <p>Meesho</p>
                    </div>
                </div>
            </div>
            @endforeach       
        @endif
        
@endsection