@extends('welcome')
@section('content')
    ;
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile - GreenBasket</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            /* Global Styles */
            :root {
                --primary: #4CAF50;
                --primary-dark: #45a049;
                --light-gray: #f5f5f5;
                --border: #e0e0e0;
                --text: #333;
                --text-light: #666;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
                color: var(--text);
                background-color: #f9f9f9;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
                display: grid;
                grid-template-columns: 300px 1fr;
                gap: 30px;
            }

            /* Sidebar Navigation */
            .profile-sidebar {
                background: white;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                padding: 20px;
                height: fit-content;
            }

            .profile-header {
                text-align: center;
                padding-bottom: 20px;
                border-bottom: 1px solid var(--border);
                margin-bottom: 20px;
            }

            .profile-pic {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover;
                border: 3px solid var(--primary);
                margin: 0 auto 15px;
            }

            .profile-name {
                font-size: 1.3rem;
                margin: 5px 0;
            }

            .profile-email {
                color: var(--text-light);
                font-size: 0.9rem;
            }

            .nav-menu {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .nav-item {
                margin-bottom: 5px;
            }

            .nav-link {
                display: flex;
                align-items: center;
                padding: 12px 15px;
                color: var(--text);
                text-decoration: none;
                border-radius: 5px;
                transition: all 0.3s;
            }

            .nav-link:hover,
            .nav-link.active {
                background-color: var(--light-gray);
                color: var(--primary);
            }

            .nav-link i {
                margin-right: 10px;
                width: 20px;
                text-align: center;
            }

            /* Main Content */
            .profile-content {
                background: white;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                padding: 30px;
            }

            .section-title {
                font-size: 1.5rem;
                margin-top: 0;
                margin-bottom: 25px;
                padding-bottom: 15px;
                border-bottom: 1px solid var(--border);
                display: flex;
                align-items: center;
            }

            .section-title i {
                margin-right: 10px;
                color: var(--primary);
            }

            /* Account Details */
            .detail-row {
                display: grid;
                grid-template-columns: 150px 1fr;
                margin-bottom: 20px;
                align-items: center;
            }

            .detail-label {
                font-weight: 600;
                color: var(--text-light);
            }

            .detail-value {
                padding: 8px 0;
            }

            .edit-btn {
                background: none;
                border: none;
                color: var(--primary);
                cursor: pointer;
                font-size: 0.9rem;
                display: inline-flex;
                align-items: center;
                margin-left: 10px;
            }

            .edit-btn i {
                margin-right: 5px;
            }

            /* Address Book */
            .address-cards {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
            }

            .address-card {
                border: 1px solid var(--border);
                border-radius: 8px;
                padding: 20px;
                position: relative;
            }

            .address-card.default {
                border-color: var(--primary);
                background-color: rgba(76, 175, 80, 0.05);
            }

            .address-type {
                position: absolute;
                top: 10px;
                right: 10px;
                background: var(--primary);
                color: white;
                padding: 3px 8px;
                border-radius: 3px;
                font-size: 0.7rem;
                text-transform: uppercase;
            }

            .address-actions {
                display: flex;
                gap: 10px;
                margin-top: 15px;
            }

            .action-btn {
                padding: 5px 10px;
                border-radius: 4px;
                font-size: 0.8rem;
                cursor: pointer;
            }

            .edit-address {
                background: var(--light-gray);
                border: 1px solid var(--border);
                color: var(--text);
            }

            .remove-address {
                background: none;
                border: 1px solid #f44336;
                color: #f44336;
            }

            /* Order History */
            .order-card {
                border: 1px solid var(--border);
                border-radius: 8px;
                padding: 20px;
                margin-bottom: 20px;
            }

            .order-header {
                display: flex;
                justify-content: space-between;
                margin-bottom: 15px;
                padding-bottom: 15px;
                border-bottom: 1px solid var(--border);
            }

            .order-id {
                font-weight: 600;
            }

            .order-date {
                color: var(--text-light);
            }

            .order-status {
                padding: 3px 10px;
                border-radius: 3px;
                font-size: 0.8rem;
                font-weight: 500;
            }

            .status-delivered {
                background: #E8F5E9;
                color: #2E7D32;
            }

            .status-pending {
                background: #FFF8E1;
                color: #FF8F00;
            }

            .order-products {
                display: flex;
                gap: 15px;
                margin-bottom: 15px;
                flex-wrap: wrap;
            }

            .product-img {
                width: 60px;
                height: 60px;
                border-radius: 5px;
                object-fit: cover;
                border: 1px solid var(--border);
            }

            .order-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: 15px;
                border-top: 1px solid var(--border);
            }

            .order-total {
                font-weight: 600;
            }

            .order-actions .btn {
                padding: 8px 15px;
                margin-left: 10px;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .container {
                    grid-template-columns: 1fr;
                }

                .detail-row {
                    grid-template-columns: 1fr;
                    margin-bottom: 15px;
                }

                .detail-label {
                    margin-bottom: 5px;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <!-- Sidebar Navigation -->
            <div class="profile-sidebar">
                <div class="profile-header">
                    <img src="{{ auth()->check() && auth()->user()->image_url
                        ? asset('/storage/' . auth()->user()->image_url)
                        : asset('images/default-profile.png') }}"
                        alt="Profile Picture" class="profile-pic">

                    @if (auth()->check() && auth()->user()->name)
                        <h3 class="profile-name">{{ auth()->user()->name }}</h3>
                        <p class="profile-email">{{ auth()->user()->email }}</p>
                    @endif
                    
                </div>

                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#account" class="nav-link active">
                            <i class="fas fa-user"></i> Account Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#orders" class="nav-link">
                            <i class="fas fa-shopping-bag"></i> My Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#addresses" class="nav-link">
                            <i class="fas fa-map-marker-alt"></i> Address Book
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#wishlist" class="nav-link">
                            <i class="fas fa-heart"></i> Wishlist
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" class="nav-link">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#logout" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="profile-content">
                <!-- Account Details Section -->
                <div id="account">
                    <h2 class="section-title">
                        <i class="fas fa-user"></i> Account Details
                    </h2>

                    <div class="detail-row">
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value">
                          {{ optional(auth()->user())->name }}
                            <button class="edit-btn">
                                <a href="{{ route('profile.update') }}"><i class="fas fa-edit"></i> Edit</a>
                            </button>
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">
                            {{optional(auth()->user())->email }}
                            <button class="edit-btn">
                                <a href="{{ route('profile.update') }}"><i class="fas fa-edit"></i> Edit</a>
                            </button>
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">
                            {{optional(auth()->user())->phone }}
                            <button class="edit-btn">
                                <a href="{{ route('profile.update') }}"><i class="fas fa-edit"></i> Edit</a>
                            </button>
                        </div>
                    </div>

                    {{-- <div class="detail-row">
                    <div class="detail-label">Date of Birth</div>
                    <div class="detail-value">
                        {{ auth()->user()->date_of_birth }}
                        <button class="edit-btn">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </div>
                </div> --}}

                    {{-- <div class="detail-row">
                    <div class="detail-label">Password</div>
                    <div class="detail-value">
                        ********
                        <button class="edit-btn">
                            <i class="fas fa-edit"></i> Change
                        </button>
                    </div>
                </div> --}}
                </div>

                <!-- Address Book Section -->
                <div id="addresses" style="margin-top: 50px;">
                    <h2 class="section-title">
                        <i class="fas fa-map-marker-alt"></i> Address Book
                    </h2>

                    <div class="address-cards">
                        <div class="address-card default">
                            <span class="address-type">Default</span>
                            <h3>Home</h3>
                            <p>Siddhesh Kumar</p>
                            <p>123 Green Valley Apartments</p>
                            <p>Mumbai, Maharashtra 400001</p>
                            <p>Phone: +91 9876543210</p>

                            <div class="address-actions">
                                <button class="action-btn edit-address">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="action-btn remove-address">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>

                        <div class="address-card">
                            <h3>Office</h3>
                            <p>Siddhesh Kumar</p>
                            <p>Tech Park Building, Floor 5</p>
                            <p>Andheri East, Mumbai 400093</p>
                            <p>Phone: +91 9876543211</p>

                            <div class="address-actions">
                                <button class="action-btn edit-address">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="action-btn remove-address">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                                <button class="action-btn" style="background: var(--primary); color: white; border: none;">
                                    <i class="fas fa-check"></i> Set Default
                                </button>
                            </div>
                        </div>

                        <div class="address-card"
                            style="border: 2px dashed var(--border); display: flex; justify-content: center; align-items: center; cursor: pointer;">
                            <div style="text-align: center; color: var(--primary);">
                                <i class="fas fa-plus" style="font-size: 1.5rem; display: block; margin-bottom: 5px;"></i>
                                Add New Address
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order History Section -->
                <div id="orders" style="margin-top: 50px;">
                    <h2 class="section-title">
                        <i class="fas fa-shopping-bag"></i> Order History
                    </h2>

                    <div class="order-card">
                        <div class="order-header">
                            <div>
                                <span class="order-id">Order #GB12345</span>
                                <span class="order-date">Placed on 15 May 2023</span>
                            </div>
                            <span class="order-status status-delivered">Delivered</span>
                        </div>

                        <div class="order-products">
                            <img src="https://via.placeholder.com/100x100/4CAF50/FFFFFF?text=Apple" alt="Product"
                                class="product-img">
                            <img src="https://via.placeholder.com/100x100/45a049/FFFFFF?text=Banana" alt="Product"
                                class="product-img">
                            <img src="https://via.placeholder.com/100x100/388E3C/FFFFFF?text=Spinach" alt="Product"
                                class="product-img">
                        </div>

                        <div class="order-footer">
                            <div class="order-total">Total: ₹547.00</div>
                            <div class="order-actions">
                                <button class="btn btn-outline">Track Order</button>
                                <button class="btn btn-primary">Reorder</button>
                            </div>
                        </div>
                    </div>

                    <div class="order-card">
                        <div class="order-header">
                            <div>
                                <span class="order-id">Order #GB12344</span>
                                <span class="order-date">Placed on 10 May 2023</span>
                            </div>
                            <span class="order-status status-pending">Processing</span>
                        </div>

                        <div class="order-products">
                            <img src="https://via.placeholder.com/100x100/4CAF50/FFFFFF?text=Tomato" alt="Product"
                                class="product-img">
                            <img src="https://via.placeholder.com/100x100/45a049/FFFFFF?text=Cucumber" alt="Product"
                                class="product-img">
                        </div>

                        <div class="order-footer">
                            <div class="order-total">Total: ₹328.00</div>
                            <div class="order-actions">
                                <button class="btn btn-outline">View Details</button>
                                <button class="btn btn-primary">Cancel Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Simple tab switching functionality
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all links
                    document.querySelectorAll('.nav-link').forEach(item => {
                        item.classList.remove('active');
                    });

                    // Add active class to clicked link
                    this.classList.add('active');

                    // Hide all sections
                    document.querySelectorAll('.profile-content > div').forEach(section => {
                        section.style.display = 'none';
                    });

                    // Show the selected section
                    const targetId = this.getAttribute('href');
                    document.querySelector(targetId).style.display = 'block';
                });
            });

            // Initialize - show account section by default
            document.querySelector('#account').style.display = 'block';
            document.querySelectorAll('.profile-content > div:not(#account)').forEach(section => {
                section.style.display = 'none';
            });
        </script>
    </body>

    </html>
@endsection
