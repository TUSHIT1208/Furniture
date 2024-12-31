@extends('Template.admin')

@section('addproduct')
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card animated-form">
                    <h2 class="text-danger text-center mb-4">ADD NEW PRODUCT</h2>
                    @if (session('success'))
                        <p class="success-message">
                            <i class="fas fa-check rotate"></i> <!-- Rotating Check Icon -->
                            {{ session('success') }}
                        </p>
                    @endif
                    <form class="card" action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Brand name<span class="text-danger"> *</span></label> 
                                <input type="text" id="fname" name="bname" placeholder="Product Brand" onblur="validate(1)" value="{{ old('bname') }}"> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Discount<span class="text-danger"> *</span></label>
                                <input type="text" id="lname" name="dis" placeholder="Product Discount" onblur="validate(2)" value="{{ old('dis') }}"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left mt-4">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Unit<span class="text-danger"> *</span></label> 
                                <input type="text" id="email" name="unit" placeholder="Product Unit ( Quantity based, weight based, length based, etc )" onblur="validate(3)" value="{{ old('unit') }}"> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                                <input type="text" id="mob" name="price" placeholder="Product Price" onblur="validate(7)" value="{{ old('price') }}"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left mt-4">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Description<span class="text-danger"> *</span></label> 
                                <input type="text" id="job" name="discription" placeholder="Enter The Product Description" onblur="validate(6)" value="{{ old('discription') }}"> 
                            </div>
                            <div class="form-group col-sm-6 flex-column"> 
                                <label class="form-control-label px-3 mt-3">Product Status<span class="text-danger"> *</span></label><br>
                                <input type="radio" id="status" name="status" value="Active" class="mt-2">Active&nbsp;&nbsp;
                                <input type="radio" id="status" name="status" value="Inactive" class="mt-2">Inactive
                            </div>
                        </div>

                        <div class="row justify-content-between text-left mt-4">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">Product Image<span class="text-danger"> *</span></label> 
                                <input type="file" id="ans" name="pimage" onblur="validate(8)" value="{{ old('pimage') }}"> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex mt-3"> 
                                <label class="form-control-label px-3">Product Category<span class="text-danger"> *</span></label>
                                <select name="category" class="form-control">
                                    <option hidden selected>Select Product Category</option>
                                    @foreach ($cdata as $row)
                                        <option value="{{ $row->id }}">{{ $row->cname }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                       <button>add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>            
              
    <style>
        /* Rotation animation for check icon */
        .rotate {
            
            animation: rotateIcon 1s ease-in-out;
        }

        @keyframes rotateIcon {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Success message fade-in animation */
        .success-message {
            position: relative;
            display: inline-flex;
            align-items: center;
            color: green;
            font-family: 'boxicons';
            left: 35%;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards, slideUp 1s ease-out forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            0% {
                transform: translateY(20px);
            }
            100% {
                transform: translateY(0);
            }
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
