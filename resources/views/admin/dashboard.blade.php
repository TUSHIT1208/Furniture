@extends('Template.admin')

@section('dash')
<!-- Main content starts here -->
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Dashboard Header -->
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-dark font-weight-bold animated fadeIn">Admin Dashboard</h2>
            </div>
        </div>
    </div>

    <!-- Dashboard Stats Cards -->
    <div class="row">
        <!-- Total Sales Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card shadow-card animated fadeInUp border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h5 class="card-title text-muted">Total Sales</h5>
                        <h3 class="text-dark">$1,250.00</h3>
                        <small class="text-muted">Total sales this month</small>
                    </div>
                    <div class="ml-auto">
                        <i class="fas fa-dollar-sign fa-3x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Orders Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card shadow-card animated fadeInUp border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h5 class="card-title text-muted">Total Orders</h5>
                        <h3 class="text-dark">350</h3>
                        <small class="text-muted">Orders placed this month</small>
                    </div>
                    <div class="ml-auto">
                        <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Products Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card shadow-card animated fadeInUp border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h5 class="card-title text-muted">Total Products</h5>
                        <h3 class="text-dark">120</h3>
                        <small class="text-muted">Products in your store</small>
                    </div>
                    <div class="ml-auto">
                        <i class="fas fa-cogs fa-3x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Customers Card -->
        <div class="col-12 col-md-6 col-xl-3 mb-4">
            <div class="card shadow-card animated fadeInUp border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h5 class="card-title text-muted">Total Customers</h5>
                        <h3 class="text-dark">89</h3>
                        <small class="text-muted">Registered customers</small>
                    </div>
                    <div class="ml-auto">
                        <i class="fas fa-users fa-3x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart and Stats Section -->
    <div class="row">
        <div class="col-12 col-lg-8 mb-4">
            <!-- Sales Overview Chart -->
            <div class="card shadow-card animated fadeInLeft border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0">Sales Overview</h5>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-4">
            <!-- Recent Orders Table -->
            <div class="card shadow-card animated fadeInRight border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0">Recent Orders</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>#12345</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>$120.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>#12346</td>
                                <td><span class="badge bg-warning">Active</span></td>
                                <td>$250.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>#12347</td>
                                <td><span class="badge bg-danger">Inactive</span></td>
                                <td>$85.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

<!-- Add Scripts for Chart.js -->
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sales Chart Data
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Sales',
                data: [120, 190, 300, 500, 250, 400],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

<!-- Custom CSS -->
@section('styles')
<style>
    /* Global Styles */
    .text-dark {
        color: #343a40 !important;
    }
    .text-muted {
        color: #6c757d !important;
    }
    
    /* Card Styles */
    .shadow-card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .shadow-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Animated Button */
    .animated-button {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .animated-button:hover {
        transform: scale(1.05);
        background-color: #0056b3;
    }

    /* Table Styles */
    .table-striped tbody tr:nth-child(odd) {
        background-color: #f8f9fa;
    }
    .badge {
        font-size: 14px;
    }

    /* Chart Container */
    .card-body canvas {
        width: 100% !important;
    }

    /* Animation Effects */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .fadeIn {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fadeInUp {
        animation: fadeInUp 1s ease-in-out;
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .fadeInLeft {
        animation: fadeInLeft 1s ease-in-out;
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .fadeInRight {
        animation: fadeInRight 1s ease-in-out;
    }
</style>
@endsection
