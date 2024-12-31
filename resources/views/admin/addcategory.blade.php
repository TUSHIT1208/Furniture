@extends('Template.admin')
@section('addcategory')
    <div class="card animated-form" style="width : 50%; position : relative; top : 15%; left : 25%; border-radius : 10px;">
        @if (@session('success'))
            <h5 style="text-align: center; color: #37a26f; font-family: auto">{{ @session('success') }}</h5>
        @endif
        <h1 class="text text-danger" style="text-align: center;">Add new Category</h1>
        <form action="{{ route('category.store') }}" method="POST" class="card container" style="text-align: center; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            @csrf
            <input type="text" placeholder="Enter Product Category" class="form-control" style="width : 50%; position : relative; left : 30%;" name="category" required>
            <button type="submit" class="btn mt-4" style="background: #3b5d50da; color : white;">Add Category</button>
        </form>
    </div>

    <!-- Add custom CSS for slide-in and bounce animations -->
    <style>
        /* Slide-in and Bounce animation */
        @keyframes slideInBounce {
            0% {
                transform: translateX(100%); /* Start from the right */
                opacity: 0;
            }
            60% {
                transform: translateX(-20px); /* Slide in and bounce */
                opacity: 1;
            }
            100% {
                transform: translateX(0); /* Final position */
            }
        }

        .animated-form {
            animation: slideInBounce 1s ease-out forwards;
        }

        /* Optional: Animation for the form fields */
        @keyframes fadeInField {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            animation: fadeInField 0.8s ease-out forwards;
        }

        .form-group:nth-child(odd) {
            animation-delay: 0.2s;
        }

        .form-group:nth-child(even) {
            animation-delay: 0.4s;
        }
    </style>

    <!-- Optionally, you can add a staggered animation for the input fields -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.form-group');
            inputs.forEach((input, index) => {
                input.style.animationDelay = `${index * 0.2}s`; // Delay between fields
            });
        });
    </script>
@endsection
