@extends('Template.admin')

@section('user')
    <h1 class="text text-danger" style="text-align: center; position : relative; top : 10%;">Register Client List</h1>
    
    <!-- Card container -->
    <div class="container mt-5 row" style="text-align: center; position : relative; top : 10%;">
        @foreach ($clients as $row)
            <div class="col-md-3 mb-4">
                <div class="card flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <!-- Front of the card -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $row->name }}</h5>
                                <p class="card-text">Address : {{ Str::limit($row->address, 50) }}</p>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <!-- Back of the card -->
                            <div class="card-body">
                                <p>Email: {{ $row->email }}</p>
                                <p>Phone: +91 {{ $row->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Include Bootstrap and Custom Script -->
    <style>
        /* Card Flip Animation */
        .flip-card {
            width: 100%;
            height: 300px;
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.8s;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .flip-card-front {
            background-color: #f1f1f1;
        }

        .flip-card-back {
            background-color: #3b5d50da;
            color: white;
            transform: rotateY(180deg);
        }

        /* Zoom-In Effect */
        @keyframes zoomIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .flip-card {
            animation: zoomIn 0.6s ease-out forwards;
        }

        /* Optional: Card Text Style */
        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
        }
    </style>

    <script>
        // JavaScript for Staggered Animation with Delay
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.flip-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.2}s`; // Delay between card animations
            });
        });
    </script>
@endsection
