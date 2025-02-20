@extends('Template.master')
@section('checkout')

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
	<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

	<script>
		AOS.init({
			duration: 1000, // Animation duration in milliseconds
			offset: 100,    // Trigger animation 100px before the element is visible
		});
	</script>	

	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Checkout</h1>
					</div>
				</div>
				<div class="col-lg-7">
					
				</div>
			</div>
		</div>
	</div>
<!-- End Hero Section -->

<div class="untree_co-section">
	<div class="container">
	  <div class="row mb-5">
		<div class="col-md-12">
		  <div class="border p-4 rounded" role="alert">
			Returning customer? <a href="#">Click here</a> to login
		  </div>
		</div>
	  </div>
	<div class="row">
		<form action="{{ route('placeorder.store') }}" method="POST">
		@csrf
		<div class="col-md-6 mb-5 mb-md-0">
		  <h2 class="h3 mb-3 text-black">Billing Details</h2>
		  <div class="p-3 p-lg-5 border bg-white">
			<div class="form-group">
			  <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
			  <select id="c_country" class="form-control" name="country">
				<option value="1">Select a country</option>    
				<option value="India">India</option>    
				<option value="Algeria">Algeria</option>    
				<option value="Afghanistan">Afghanistan</option>    
				<option value="Ghana">Ghana</option>      
			  </select>
			</div>
			<div class="form-group row">
			  <div class="col-md-6">
				<label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="c_fname" name="first_name">
				<span>
					@error('first_name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</span>
			  </div>
			  <div class="col-md-6">
				<label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="c_lname" name="last_name">
				<span>
					@error('last_name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</span>
			  </div>
			</div>

			<div class="form-group row">
			  <div class="col-md-12">
				<label for="c_companyname" class="text-black">Company Name </label>
				<input type="text" class="form-control" id="c_companyname" name="c_companyname">
			  </div>
			</div>

			<div class="form-group row">
			  <div class="col-md-12">
				<label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="c_address" name="address" placeholder="Street address">
				<span>
					@error('address')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</span>
			  </div>
			</div>

			<div class="form-group mt-3">
			  <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
			</div>

			<div class="form-group row">
			  <div class="col-md-6">
				<label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="c_state_country" name="state">
				<span>
					@error('state')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</span>
			  </div>
			  <div class="col-md-6">
				<label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="c_postal_zip" name="pincode">
				<span>
					@error('pincode')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</span>
			  </div>
			</div>

			<div class="form-group row mb-5">
			  <div class="col-md-6">
				<label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="c_email_address" name="email">
				<span>
					@error('email')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</span>
			  </div>
			  <div class="col-md-6">
				<label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number">
				<span>
					@error('phone')
						<span class="text-danger">{{ $message }}</span>
					@enderror
				</span>
			  </div>
			</div>

			<div class="form-group">
			  <label for="c_create_account" class="text-black" data-bs-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
			  <div class="collapse" id="create_an_account">
				<div class="py-2 mb-4">
				  <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
				  <div class="form-group">
					<label for="c_account_password" class="text-black">Account Password</label>
					<input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
				  </div>
				</div>
			  </div>
			</div>


			<div class="form-group">
			  <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
			  <div class="collapse" id="ship_different_address">
				<div class="py-2">

				  <div class="form-group">
					<label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
					<select id="c_diff_country" class="form-control">
					  <option value="1">Select a country</option>    
					  <option value="2">bangladesh</option>    
					  <option value="3">Algeria</option>    
					  <option value="4">Afghanistan</option>    
					  <option value="5">Ghana</option>    
					  <option value="6">Albania</option>    
					  <option value="7">Bahrain</option>    
					  <option value="8">Colombia</option>    
					  <option value="9">Dominican Republic</option>    
					</select>
				  </div>


				  <div class="form-group row">
					<div class="col-md-6">
					  <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
					</div>
					<div class="col-md-6">
					  <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
					</div>
				  </div>

				  <div class="form-group row">
					<div class="col-md-12">
					  <label for="c_diff_companyname" class="text-black">Company Name </label>
					  <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
					</div>
				  </div>

				  <div class="form-group row  mb-3">
					<div class="col-md-12">
					  <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
					</div>
				  </div>

				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
				  </div>

				  <div class="form-group row">
					<div class="col-md-6">
					  <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
					</div>
					<div class="col-md-6">
					  <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
					</div>
				  </div>

				  <div class="form-group row mb-5">
					<div class="col-md-6">
					  <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
					</div>
					<div class="col-md-6">
					  <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
					  <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
					</div>
				  </div>

				</div>

			  </div>
			</div>

		  </div>
		</div>
		<div class="col-md-6">

		  <div class="row mb-5" style="position: relative; left: 110%; bottom: 785px;">
			<div class="col-md-12">
			  <h2 class="h3 mb-3 text-black">Coupon Code</h2>
			  <div class="p-3 p-lg-5 border bg-white">

				<label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
				<div class="input-group w-75 couponcode-wrap">
				  <input type="text" class="form-control me-2" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
				  <div class="input-group-append">
					<button class="btn btn-black btn-sm" type="button" id="button-addon2">Apply</button>
				  </div>
				</div>

			  </div>
			</div>
		  </div>

		  <div class="row mb-5" style="position: relative; left: 110%; bottom: 785px;">
			<div class="col-md-12">
			  <h2 class="h3 mb-3 text-black">Your Order</h2>
			  <div class="p-3 p-lg-5 border bg-white">
				<table class="table site-block-order-table mb-5">
					<thead>
						<th>Product</th>
						<th>Total</th>
					</thead>
					<tbody>
						@php
							$subtotal = 0;
							$totalQuantity = 0;
						@endphp
				
						@foreach ($cartData as $cart)
							@foreach ($cart->cartitem as $cartitem)
								@php
									$productImage = $productData->where('id', $cartitem->product_id)->first();
									$subtotal += $cart->total_amount;
									$totalQuantity += $cart->qty;
								@endphp
				
								<tr data-aos="fade-up">
									<td>
										<img src="{{ asset('uploads/' . $productImage->images->pimg) }}" 
											 class="product-image" 
											 width="50" 
											 height="50" 
											 style="object-fit: contain;">
										<strong class="mx-2">x</strong> 
										{{ $cart->qty }}
									</td>
									<td>${{ $cart->total_amount }}</td>
								</tr>
							@endforeach
						@endforeach
					</tbody>
					<tfoot>
						<tr data-aos="fade-up">
							<td><strong>Total Quantity</strong></td>
							<td><strong>{{ $totalQuantity }}</strong></td>
						</tr>
						<tr data-aos="fade-up">
							<td><strong>Subtotal</strong></td>
							<td><strong>${{ number_format($subtotal, 2) }}</strong></td>
						</tr>
					</tfoot>
				</table>																
				<div class="border p-3 mb-3">
				  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

				  <div class="collapse" id="collapsebank">
					<div class="py-2">
					  <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
					</div>
				  </div>
				</div>

				<div class="border p-3 mb-3">
				  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

				  <div class="collapse" id="collapsecheque">
					<div class="py-2">
					  <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
					</div>
				  </div>
				</div>

				<div class="border p-3 mb-5">
				  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

				  <div class="collapse" id="collapsepaypal">
					<div class="py-2">
					  <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
					</div>
				  </div>
				</div>
				<div class="form-group">
					@foreach ($cartData as $cart)
						@foreach ($cart->cartitem as $cartitem)
								<input type="hidden" name="cartIds[]" value="{{ $cartitem->id }}">
							@endforeach
						@endforeach
					<button class="btn btn-black btn-lg py-3 btn-block">Place Order</button>
				</form>
				</div>				
			  </div>
			</div>
		  </div>

		</div>
	  </div>
		</form>
	</div>
  </div>
@endsection