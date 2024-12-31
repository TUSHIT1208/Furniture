<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>

  <title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>

  <style>
    /* Modal styling */
.modal_for_profile {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Black background with opacity */
}

/* Modal content styling */
.modal-content {
    background-color: #2c3e50; /* Classic dark background */
    margin: 10% auto;
    padding: 30px;
    border-radius: 15px;
    width: 450px;
    text-align: center;
    color: white;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
    position: relative;
}

/* Profile image styling */
.profile-header {
    position: relative;
    margin-top: -80px;
}
.profile-img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #ecf0f1;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

/* Profile details */
.profile-details {
    margin-top: 20px;
}
.profile-name {
    font-size: 1.8rem;
    font-weight: bold;
    color: #ecf0f1;
    margin-bottom: 10px;
}
.profile-email, .profile-phone, .profile-address {
    font-size: 1rem;
    color: #bdc3c7;
    margin: 5px 0;
}
.profile-email i, .profile-phone i, .profile-address i {
    margin-right: 10px;
}

/* Logout button */
.logout-button {
    background-color: #e74c3c;
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 1rem;
    text-transform: uppercase;
    font-weight: bold;
    margin-top: 20px;
    display: inline-block;
}

/* Close button */
.close {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 24px;
    color: #ecf0f1;
    cursor: pointer;
}

/* Animation */
.animate-popup {
    animation: fadeIn 0.6s, slideIn 0.6s;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { transform: translateY(-50px); }
    to { transform: translateY(0); }
}

  </style>

</head>
<body>
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
      <div style="width: 50px; height: 50px; border-radius: 50%; background-color: #4c846f !important; display: flex; align-items: center; justify-content: center; color: white; position : relative; right : 7%;" id="userIcon">
        <i class="fas fa-user" id="profileIcon"></i>
      </div>    
      <a class="navbar-brand" href="/">Furni<span>.</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
          <li><a class="nav-link" href="/shop">Shop</a></li>
          <li><a class="nav-link" href="/about">About us</a></li>
          <li><a class="nav-link" href="/blog">Blog</a></li>
        </ul>
        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li><a class="nav-link" href="/login"><img src="images/user.svg"></a></li>
          <li><a class="nav-link" href="{{ route('addcart.index') }}"><img src="images/cart.svg"></a></li>
          <li><a style="color: white; font-size : 150%; position : relative; left : 150%; top : 23%;" href="{{ route('addwishlist.index') }}"><i class="far fa-heart"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>

  @if(isset($profileId))
    <div id="userModal" class="modal_for_profile">
      <div class="modal-content professional-card animate-popup">
        <!-- Close Button -->
        <span class="close">&times;</span>
        
        <!-- Profile Section -->
        <div class="profile-header">
            <img src="{{ asset('images/maxresdefault.jpg') }}" class="profile-img" alt="Profile Image">
        </div>
        <div class="profile-details">
            @if (is_object($clientProfile))
                <h2 class="profile-name">{{ $clientProfile->name }}</h2>
                <h4 class="profile-email"><i class="fas fa-envelope"></i> {{ $clientProfile->email }}</h4>
                <h4 class="profile-phone"><i class="fas fa-phone"></i> {{ $clientProfile->phone }}</h4>
                <h4 class="profile-address"><i class="fas fa-map-marker-alt"></i> {{ $clientProfile->address }}</h4>
            @else
              <p>Please <a href="/login">log in</a> to access your profile and other features.</p>
            @endif
        </div>

        <!-- Actions -->
        <div class="profile-actions">
            <a href="/logout" class="btn btn-danger logout-button"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</div>
@else
<div id="userModal" class="modal_for_profile">
    <div class="modal-content professional-card animate-popup">
        <span class="close">&times;</span>
        <h2>Welcome to Your Profile</h2>
        <p>Here you can manage your profile settings and preferences.</p>
        <a href="/login" class="btn btn-primary">LOGIN OR REGISTER</a>
    </div>
</div>
@endif


  <!-- Include your page contents here -->
  @yield('home')
  @yield('about')
  @yield('shop')
  @yield('blog')
  @yield('thanks')
  @yield('cart')
  @yield('checkout')
  @yield('wishlist')

  <!-- Start Footer Section -->
  <footer class="footer-section">
    <div class="container relative">
      <div class="sofa-img">
        <img src="images/sofa.png" alt="Image" class="img-fluid">
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="subscription-form">
            <h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>
            <form action="#" class="row g-3">
              <div class="col-auto">
                <input type="text" class="form-control" placeholder="Enter your name">
              </div>
              <div class="col-auto">
                <input type="email" class="form-control" placeholder="Enter your email">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  <span class="fa fa-paper-plane"></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row g-5 mb-5">
        <div class="col-lg-4">
          <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
          <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.</p>
          <ul class="list-unstyled custom-social">
            <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
            <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
          </ul>
        </div>
        <div class="col-lg-8">
          <div class="row links-wrap">
            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact us</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">Support</a></li>
                <li><a href="#">Knowledge base</a></li>
                <li><a href="#">Live chat</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Our team</a></li>
                <li><a href="#">Leadership</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
              <ul class="list-unstyled">
                <li><a href="#">Nordic Chair</a></li>
                <li><a href="#">Kruzo Aero</a></li>
                <li><a href="#">Ergonomic Chair</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="border-top copyright">
        <div class="row pt-4">
          <div class="col-lg-6">
            <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 text-center text-lg-end">
            <ul class="list-unstyled d-inline-flex ms-auto">
              <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer Section -->  

  <script>
      document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('userModal');
      const closeModal = document.querySelector('.close');
      const triggerIcon = document.querySelector('#profileIcon'); // Add the ID or class of your trigger icon

      // Trigger modal when clicking on the icon
      triggerIcon.addEventListener('click', function () {
          modal.style.display = 'block';
      });

      // Close modal on close button click
      closeModal.addEventListener('click', function () {
          modal.style.display = 'none';
      });

      // Close modal when clicking outside the content
      window.addEventListener('click', function (event) {
          if (event.target === modal) {
              modal.style.display = 'none';
          }
      });
    });
  </script>
</body>
</html>
