@extends('Template.admin')

@section('show_client')
    <div class="container mt-4">
        <!-- Dropdown for Product Category -->
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <label for="productSelect" class="form-label">Select Product</label>
                <select id="productSelect" class="form-select form-select-sm mb-3">
                    <option selected>Select a product</option>
                    @foreach ($category_list as $row)
                        <option value="{{ $row->id }}">{{ $row->cname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Section for Sofas -->
        <h3 class="mb-3">Sofas</h3>
        <div class="row">
            @foreach ($product as $row)
                <div class="col-md-3 mb-4">
                    <div class="card product-card wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#productModal{{ $row->id }}">
                            <img src="{{ asset('uploads/' . $row->images->pimg) }}" class="card-img-top" alt="{{ $row->name }}">
                        </a>
                        <div class="card-body text-center">
                            <h4 style="color: red">Brand</h4>
                            <p class="card-text">{{ $row->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Section for Chairs -->
        <h3 class="mb-3">Chairs</h3>
        <div class="row">
            @foreach ($chair as $row)
                <div class="col-md-3 mb-4">
                    <div class="card product-card wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#productModal{{ $row->id }}">
                            <img src="{{ asset('uploads/' . $row->images->pimg) }}" class="card-img-top" alt="{{ $row->name }}">
                        </a>
                        <div class="card-body text-center">
                            <h4 style="color: red">Brand</h4>
                            <p class="card-text">{{ $row->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Modal for Product Details -->
        @foreach (array_merge($product->all(), $chair->all()) as $row)
            <div class="modal fade" id="productModal{{ $row->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $row->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel{{ $row->id }}">{{ $row->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('uploads/' . $row->images->pimg) }}" class="img-fluid mb-3" alt="{{ $row->name }}">
                            <p><strong>Brand:</strong> {{ $row->brand }}</p>
                            <p><strong>Unit:</strong> {{ $row->unit }}</p>
                            <p><strong>Price:</strong> ${{ $row->price }}</p>
                            <p><strong>Discount:</strong> {{ $row->discount }}%</p>
                            <p><strong>Description:</strong> {{ $row->description ?? 'No description available' }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('styles')
    <style>
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            max-height: 200px;
            object-fit: cover;
        }

        /* Custom Modal Styles */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.7); /* Darken the background */
            transition: opacity 0.5s ease;
        }

        /* Centering the modal on the screen */
        .modal-dialog {
            max-width: 800px;
            margin: 30px auto;
        }

        .modal-content {
            animation: fadeIn 0.5s ease-out;
        }

        /* Fade-in effect for the modal */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow.js/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
@endsection