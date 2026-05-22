<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DariMata Admin - Dashboard</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --primary-dark: #3a0ca3;
            --secondary: #7209b7;
            --accent: #f72585;
            --success: #4cc9f0;
            --warning: #f8961e;
            --danger: #ef233c;
            --light: #f8f9fa;
            --dark: #212529;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --gray-900: #212529;
            
            --bg: #f5f7ff;
            --card: #ffffff;
            --text: #2b2d42;
            --text-light: #8d99ae;
            --border: rgba(0,0,0,0.08);
            
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
            --shadow: 0 4px 12px rgba(0,0,0,0.08);
            --shadow-md: 0 8px 24px rgba(0,0,0,0.12);
            --shadow-lg: 0 16px 48px rgba(0,0,0,0.16);
            
            --radius-sm: 6px;
            --radius: 12px;
            --radius-lg: 18px;
            --radius-xl: 24px;
        }
        
        .dark-mode {
            --bg: #0f172a;
            --card: #1e293b;
            --text: #f8fafc;
            --text-light: #94a3b8;
            --border: rgba(255,255,255,0.08);
            
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.2);
            --shadow: 0 4px 12px rgba(0,0,0,0.25);
            --shadow-md: 0 8px 24px rgba(0,0,0,0.3);
            --shadow-lg: 0 16px 48px rgba(0,0,0,0.35);
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            -webkit-font-smoothing: antialiased;
            line-height: 1.5;
        }
        
        /* Layout */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        .admin-sidebar {
            width: 240px;
            background: var(--card);
            padding: 24px 0;
            border-right: 1px solid var(--border);
            position: relative;
            z-index: 10;
            transition: all 0.3s ease;
        }
        
        .admin-main {
            flex: 1;
            padding: 32px 40px;
            transition: all 0.3s ease;
        }
        
        /* Sidebar */
        .admin-sidebar .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 32px;
            padding: 0 24px;
        }
        
        .admin-sidebar .logo img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        
        .admin-sidebar .logo h4 {
            font-weight: 700;
            font-size: 18px;
            margin-left: 12px;
            margin-bottom: 0;
            color: var(--primary);
        }
        
        .admin-sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            margin: 4px 12px;
            color: var(--text-light);
            font-weight: 500;
            border-radius: var(--radius);
            transition: all 0.2s ease;
        }
        
        .admin-sidebar .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 12px;
            font-size: 16px;
        }
        
        .admin-sidebar .nav-link:hover {
            color: var(--primary);
            background: rgba(var(--primary), 0.1);
        }
        
        .admin-sidebar .nav-link.active {
            color: white;
            background: var(--primary);
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(var(--primary), 0.2);
        }
        
        .admin-sidebar .nav-link.active:hover {
            background: var(--primary-dark);
        }
        
        /* Main Content */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }
        
        .page-title {
            font-weight: 700;
            font-size: 24px;
            margin: 0;
            color: var(--text);
        }
        
        /* Cards */
        .card {
            background: var(--card);
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border);
            padding: 16px 24px;
            font-weight: 600;
        }
        
        .card-body {
            padding: 24px;
        }
        
        /* Stats Cards */
        .stat-card {
            background: var(--card);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: none;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }
        
        .stat-card .icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: white;
            font-size: 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .stat-card h3 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 4px 0;
        }
        
        .stat-card div {
            font-size: 14px;
            color: var(--text-light);
            font-weight: 500;
        }
        
        .stat-card .trend {
            font-size: 12px;
            margin-top: 8px;
            display: flex;
            align-items: center;
        }
        
        .stat-card .trend.up {
            color: var(--success);
        }
        
        .stat-card .trend.down {
            color: var(--danger);
        }
        
        /* Tables */
        .table-container {
            background: var(--card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            padding: 24px;
            margin-bottom: 24px;
        }
        
        .table {
            color: var(--text);
            margin-bottom: 0;
        }

        .table th {
            background: rgba(var(--primary), 0.05);
            color: var(--primary);
            font-weight: 600;
            border: none;
            padding: 12px 16px;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .table td {
            border: none;
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border);
        }
        
        .table tr:last-child td {
            border-bottom: none;
        }
        
        .table-hover tbody tr:hover {
            background: rgba(var(--primary), 0.03);
        }
        
        /* Badges */
        .badge {
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .badge-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        .badge-success {
            background: linear-gradient(135deg, var(--success), #38b6ff);
        }
        
        .badge-warning {
            background: linear-gradient(135deg, var(--warning), #ffaa2c);
        }
        
        .badge-danger {
            background: linear-gradient(135deg, var(--danger), #ff6b6b);
        }
        
        .badge-secondary {
            background: linear-gradient(135deg, var(--secondary), #9d4edd);
        }
        
        /* Buttons */
        .btn {
            font-weight: 600;
            padding: 8px 20px;
            border-radius: var(--radius);
            transition: all 0.2s ease;
            border: none;
            box-shadow: var(--shadow-sm);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: var(--shadow);
            color: white;
        }
        
        .btn-outline-primary {
            border: 1px solid var(--primary);
            color: var(--primary);
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
        }
        
        /* Forms */
        .form-control {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 10px 16px;
            background: var(--card);
            color: var(--text);
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(var(--primary), 0.1);
        }
        
        /* Dark Mode Toggle */
        .dark-mode-toggle {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            z-index: 100;
            transition: all 0.3s ease;
        }
        
        .dark-mode-toggle:hover {
            transform: scale(1.1);
        }
        
        /* Tabs */
        .tab-pane {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        
        .tab-pane.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .admin-sidebar {
                width: 80px;
                padding: 16px 0;
            }
            
            .admin-sidebar .logo h4,
            .admin-sidebar .nav-link span {
                display: none;
            }
            
            .admin-sidebar .nav-link {
                justify-content: center;
                padding: 12px;
            }
            
            .admin-sidebar .nav-link i {
                margin-right: 0;
            }
            
            .admin-main {
                padding: 24px;
            }
        }
        
        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }
            
            .admin-sidebar {
                width: 100%;
                height: auto;
                padding: 12px;
            }
            
            .admin-sidebar .nav {
                display: flex;
                flex-direction: row;
                overflow-x: auto;
                padding-bottom: 8px;
            }
            
            .admin-sidebar .nav-item {
                flex: 0 0 auto;
            }
            
            .admin-sidebar .nav-link {
                padding: 8px 12px;
                margin: 0 4px;
            }
            
            .admin-main {
                padding: 16px;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .page-title {
                margin-bottom: 16px;
            }
        }
        
        /* Utility Classes */
        .text-primary { color: var(--primary) !important; }
        .text-success { color: var(--success) !important; }
        .text-warning { color: var(--warning) !important; }
        .text-danger { color: var(--danger) !important; }
        .text-light { color: var(--text-light) !important; }
        
        .bg-primary { background-color: var(--primary) !important; }
        .bg-success { background-color: var(--success) !important; }
        .bg-warning { background-color: var(--warning) !important; }
        .bg-danger { background-color: var(--danger) !important; }
        
        .shadow-sm { box-shadow: var(--shadow-sm) !important; }
        .shadow { box-shadow: var(--shadow) !important; }
        .shadow-lg { box-shadow: var(--shadow-lg) !important; }
        
        .rounded-sm { border-radius: var(--radius-sm) !important; }
        .rounded-lg { border-radius: var(--radius-lg) !important; }
        .rounded-xl { border-radius: var(--radius-xl) !important; }
        
        .activity-list {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px 0;
            border-bottom: 1px solid #f1f3f9;
            font-size: 15px;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #fff;
            background: #4895ef;
            flex-shrink: 0;
        }
        .activity-action.created { background: #4cc9f0; }
        .activity-action.updated { background: #f8961e; }
        .activity-action.deleted { background: #ef233c; }
        .activity-meta {
            color: #8d99ae;
            font-size: 13px;
            margin-left: auto;
            white-space: nowrap;
        }
        .activity-desc {
            font-weight: 500;
        }
        .activity-user {
            color: #4895ef;
            font-size: 13px;
            margin-left: 8px;
        }
    </style>
</head>

<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <nav class="admin-sidebar">
            <div class="logo">
                <img src="/img/logo2.png" alt="DariMata Logo">
                <h4>DariMata</h4>
            </div>
            <ul class="nav flex-column" id="adminTabNav">
                <li class="nav-item">
                    <a class="nav-link active" data-tab="dashboard" href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-tab="products" href="#">
                        <i class="fas fa-box-open"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-tab="orders" href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-tab="users" href="#">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-tab="settings" href="#">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    </li>
                </ul>
    </nav>

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Dashboard Tab -->
            <div class="tab-pane active" id="tab-dashboard">
                <div class="page-header">
                    <h1 class="page-title">Dashboard Overview</h1>
                    <div class="d-flex">
                    </div>
                
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="icon"><i class="fas fa-box-open"></i></div>
                            <div>Total Products</div>
                            <h3>{{ $totalStock }}</h3>
                            <div class="trend up">
                                <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                        </div>
                                </div>
                            </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                            <div>Total Orders</div>
                            <h3>{{ $totalOrder }}</h3>
                            <div class="trend up">
                                <i class="fas fa-arrow-up mr-1"></i> 24% from last month
                        </div>
                                </div>
                            </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="icon"><i class="fas fa-users"></i></div>
                            <div>Registered Users</div>
                            <h3>{{ $totalUsers }}</h3>
                            <div class="trend up">
                                <i class="fas fa-arrow-up mr-1"></i> 8% from last month
                        </div>
                                </div>
                            </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                            <div>Pending Orders</div>
                            <h3>{{ $pendingOrder }}</h3>
                            <div class="trend down">
                                <i class="fas fa-arrow-down mr-1"></i> 5% from last month
                        </div>
                    </div>
                    </div>
                </div>
                
                <!-- Recent Activity Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Activity</h5>
                                </div>
                                <div class="card-body">
                        <ul class="activity-list">
                            @forelse($activities as $activity)
                                <li class="activity-item">
                                    <span class="activity-icon activity-action {{ $activity->action }}">
                                        @if($activity->type == 'product')
                                            <i class="fas fa-box"></i>
                                        @elseif($activity->type == 'order')
                                            <i class="fas fa-shopping-bag"></i>
                                        @elseif($activity->type == 'user')
                                            <i class="fas fa-user"></i>
                                        @else
                                            <i class="fas fa-info-circle"></i>
                                        @endif
                                    </span>
                                    <span class="activity-desc">
                                        <strong>{{ ucfirst($activity->type) }}</strong>
                                        <span style="text-transform: capitalize;">{{ $activity->action }}</span>:
                                        {{ $activity->description }}
                                        @if($activity->user)
                                            <span class="activity-user">by {{ $activity->user->name ?? $activity->user->email }}</span>
                                        @endif
                                    </span>
                                    <span class="activity-meta">{{ $activity->created_at->diffForHumans() }}</span>
                                </li>
                            @empty
                                <li class="activity-item text-muted">No recent activity.</li>
                            @endforelse
                        </ul>
                                    </div>
                                </div>
                            </div>
            
            <!-- Products Tab -->
            <div class="tab-pane" id="tab-products">
                <div class="page-header">
                    <h1 class="page-title">Product Management</h1>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal" id="addProductBtn">
                        <i class="fas fa-plus mr-2"></i> Add Product
                    </button>
                        </div>
                
                            <div class="card">
                                <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-group mb-0">
                                <select class="form-control" style="width: 200px;">
                                    <option>Filter by Category</option>
                                    <option>Cameras</option>
                                    <option>Lenses</option>
                                    <option>Accessories</option>
                                </select>
                                    </div>
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" class="form-control" placeholder="Search products...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                            <div class="table-responsive">
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                        <th>Price</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
<tbody>
                                    @foreach($products as $product)
    <tr>
        <td>
                                                <img src="{{ asset(optional($product->primaryImage)->image_path) }}"
                                                    style="width:40px; height:40px; object-fit:cover; border-radius:4px;">
        </td>
        <td>{{ $product->name }}</td>
        <td>{{ optional($product->category)->name }}</td>
                                            <td>Rp{{ number_format($product->variants->first()->price ?? 0, 0, ',', '.') }}</td>
                                            <td>{{ $product->variants->sum('stock') }}</td>
                                            <td>
                                                @if($product->status == 'available')
        <span class="badge badge-success">Available</span>
    @else
        <span class="badge badge-secondary">Draft</span>
    @endif
</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary mr-2 btn-edit-product" 
                                                    data-id="{{ $product->id }}"
                                                    data-name="{{ $product->name }}"
                                                    data-category="{{ optional($product->category)->name }}"
                                                    data-price="{{ $product->variants->first()->price ?? '' }}"
                                                    data-sale_price="{{ $product->variants->first()->sale_price ?? '' }}"
                                                    data-stock="{{ $product->variants->sum('stock') }}"
                                                    data-status="{{ $product->status }}"
                                                    data-description="{{ $product->description }}"
                                                    data-sku="{{ $product->variants->first()->sku ?? '' }}"
                                                    data-tags="{{ $product->tags ?? '' }}"
                                                    data-sizes="{{ $product->variants->first()->size ?? '' }}"
                                                    data-meta_title="{{ $product->meta_title ?? '' }}"
                                                    data-meta_description="{{ $product->meta_description ?? '' }}"
                                                    data-toggle="modal" data-target="#editProductModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;" class="form-delete-product">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
        </td>
    </tr>
                                    @endforeach
</tbody>
                                </table>
                            </div>
                        
                        <!-- Products Tab Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted small">
                                {{ $products->links() }}
                            </div>
                        </div>
                                </div>
                                    </div>
                                </div>

            <!-- Orders Tab -->
            <div class="tab-pane" id="tab-orders">
                <div class="page-header">
                    <h1 class="page-title">Order Management</h1>
                                    </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-group mb-0">
                                <select class="form-control" style="width: 200px;">
                                    <option>All Status</option>
                                    <option>Pending</option>
                                    <option>Processing</option>
                                    <option>Shipped</option>
                                    <option>Completed</option>
                                    <option>Cancelled</option>
                                </select>
                                </div>
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" class="form-control" placeholder="Search orders...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                        </div>
                                        </div>
                                    </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                            <td>{{ $order->user->first_name ?? '-' }} {{ $order->user->last_name ?? '' }}</td>
                                            <td>{{ $order->items->count() }}</td>
                                            <td>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                            <td>
                                                <span class="badge badge-{{ $order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary btn-view-order" data-toggle="modal" data-target="#orderDetailModal"
                                                    data-order='@json($order)'>
                                                    <i class="fas fa-eye"></i>
                                    </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                    </div>
                        <!-- Orders Tab Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted small">
                                {{ $orders->links() }}
                            </div>
                                </div>
                                        </div>
                                        </div>
                                        </div>

            <!-- Users Tab -->
            <div class="tab-pane" id="tab-users">
                <div class="page-header">
                    <h1 class="page-title">User Management</h1>
                                        </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-group mb-0">
                                <select class="form-control" style="width: 200px;">
                                    <option>All Roles</option>
                                    <option>Admin</option>
                                    <option>Customer</option>
                                    </select>
                                </div>
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" class="form-control" placeholder="Search users...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                </div>
                                </div>
                            <div class="table-responsive">
                            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Registered</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->is_admin ? 'Admin' : 'Customer' }}</td>
                                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary btn-view-user" data-toggle="modal" data-target="#userDetailModal" data-user='@json($user)'>
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                <!-- Users Tab Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted small">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Settings Tab -->
<div class="tab-pane" id="tab-settings">
    <div class="page-header">
        <h1 class="page-title">Settings</h1>
        <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-danger" type="submit">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Admin Settings</h5>
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="admin_name">Admin Name</label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" value="{{ auth()->user()->name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="admin_email">Email</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" value="{{ auth()->user()->email ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="admin_password">New Password</label>
                    <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Leave blank to keep current password">
                </div>
                <button type="submit" class="btn btn-primary">Update Settings</button>
            </form>
            <hr>
            <h5 class="mb-3">Other Settings</h5>
            <div class="form-group">
                <label>Dark Mode</label>
                <button type="button" class="btn btn-outline-primary" id="settingsDarkModeToggle">
                    <i class="fas fa-moon"></i> Toggle Dark Mode
                </button>
            </div>
        </div>
    </div>
</div>
    
    <!-- Dark Mode Toggle -->
    <div class="dark-mode-toggle" id="darkModeToggle">
        <i class="fas fa-moon"></i>
                    </div>
    
    <!-- Modal Add Product -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                            </div>
                    <div class="modal-body">
                        <div class="mb-3 text-muted">Fill in the product details below.</div>
                        <div class="card p-3 mb-3 shadow-sm">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="product_name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="product_price" required>
                            </div>
                                <div class="form-group col-md-3">
                                    <label>Sale Price</label>
                                    <input type="number" class="form-control" name="product_sale_price">
                        </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Category</label>
                                    <select class="form-control" name="product_category" id="product_category" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Stock</label>
                                    <input type="number" class="form-control" name="product_stock" required>
                            </div>
                                <div class="form-group col-md-3">
                                    <label>Status</label>
                                    <select class="form-control" name="product_status" required>
                                        <option value="available">Available</option>
                                        <option value="draft">Draft</option>
                                    </select>
                        </div>
                    </div>
                            <hr>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="product_description" rows="2"></textarea>
                    </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name="product_sku">
                        </div>
                                <div class="form-group col-md-4">
                                    <label>Tags (comma separated)</label>
                                    <input type="text" class="form-control" name="product_tags">
                    </div>
                                <div class="form-group col-md-4">
                                    <label>Sizes (comma separated)</label>
                                    <input type="text" class="form-control" name="product_sizes">
                    </div>
                        </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Main Image</label>
                                    <img id="preview_main_image" src="#" alt="Preview" style="max-width:100px; display:none; margin-bottom:10px;">
                                    <input type="file" class="form-control-file" name="product_main_image" accept="image/*" onchange="previewImage(this, 'preview_main_image')">
                    </div>
                                <div class="form-group col-md-6">
                                    <label>Gallery Images</label>
                                    <input type="file" class="form-control-file" name="product_gallery_images[]" accept="image/*" multiple>
                    </div>
                        </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title">
                    </div>
                                <div class="form-group col-md-6">
                                    <label>Meta Description</label>
                                    <input type="text" class="form-control" name="meta_description">
            </div>
                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Product -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="mb-3 text-muted">Edit the product details below.</div>
                        <div class="card p-3 mb-3 shadow-sm">
                            <input type="hidden" name="product_id" id="edit_product_id">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="edit_product_name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="product_price" id="edit_product_price" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Sale Price</label>
                                    <input type="number" class="form-control" name="product_sale_price" id="edit_product_sale_price">
                            </div>
                                </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Category</label>
                                    <select class="form-control" name="product_category" id="edit_product_category" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Stock</label>
                                    <input type="number" class="form-control" name="product_stock" id="edit_product_stock" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Status</label>
                                    <select class="form-control" name="product_status" id="edit_product_status" required>
                                        <option value="available">Available</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                                </div>
                            <hr>
                                <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="product_description" id="edit_product_description" rows="2"></textarea>
                                </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name="product_sku" id="edit_product_sku">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tags (comma separated)</label>
                                    <input type="text" class="form-control" name="product_tags" id="edit_product_tags">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sizes (comma separated)</label>
                                    <input type="text" class="form-control" name="product_sizes" id="edit_product_sizes">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Main Image</label>
                                    <img id="edit_preview_main_image" src="#" alt="Preview" style="max-width:100px; display:none; margin-bottom:10px;">
                                    <input type="file" class="form-control-file" name="product_main_image" onchange="previewImage(this, 'edit_preview_main_image')">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Gallery Images</label>
                                    <input type="file" class="form-control-file" name="product_gallery_images[]" multiple>
                            </div>
                        </div>
                        <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id="edit_meta_title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Meta Description</label>
                                    <input type="text" class="form-control" name="meta_description" id="edit_meta_description">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Order Detail -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="orderDetailModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="orderDetailContent">
                    <!-- Order detail content will be filled by JS -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- User Detail Modal -->
    <div class="modal fade" id="userDetailModal" tabindex="-1" role="dialog" aria-labelledby="userDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="userDetailModalLabel">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="userDetailContent">
                    <!-- User detail content will be filled by JS -->
                </div>
            </div>
        </div>
    </div>
    
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Fallback jika file lokal tidak ada -->
    <script>
    if (typeof $().modal === 'undefined') {
        document.write('<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"><\/script>');
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(function(){
        // Tab switching function
        function showTab(tab) {
            console.log('Switching to tab:', tab);
            $('.tab-pane').removeClass('active show');
            $(`#tab-${tab}`).addClass('active show');
            
            $('#adminTabNav .nav-link').removeClass('active');
            $(`#adminTabNav .nav-link[data-tab="${tab}"]`).addClass('active');
        }
        
        // Initialize with default tab
        let hash = window.location.hash.replace('#','');
        let initialTab = (hash && $(`#tab-${hash}`).length) ? hash : 'dashboard';
        showTab(initialTab);
        
        // Tab click handler
        $(document).on('click', '#adminTabNav .nav-link', function(e){
            e.preventDefault();
            let tab = $(this).data('tab');
            window.location.hash = tab;
            showTab(tab);
            // Optional: force redraw for some browsers
            $('.admin-main').hide().show(0);
        });
        
        // Hash change handler
        $(window).on('hashchange', function(){
            let tab = window.location.hash.replace('#','');
            if ($(`#tab-${tab}`).length) {
                showTab(tab);
            }
        });
        // Debug: cek selector
        console.log($('#adminTabNav .nav-link[data-tab="products"]').length);
        console.log($('#tab-products').length);
        
        // Dark mode toggle
        $('#darkModeToggle').click(function() {
            $('body').toggleClass('dark-mode');
            const icon = $(this).find('i');
            if ($('body').hasClass('dark-mode')) {
                icon.removeClass('fa-moon').addClass('fa-sun');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                icon.removeClass('fa-sun').addClass('fa-moon');
                localStorage.setItem('darkMode', 'disabled');
            }
        });
        
        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'enabled') {
            $('body').addClass('dark-mode');
            $('#darkModeToggle i').removeClass('fa-moon').addClass('fa-sun');
        }
        
        // Edit Product Modal
        $('.btn-edit-product').on('click', function() {
            const btn = $(this);
            const id = btn.data('id');
            $('#editProductForm').attr('action', '/admin/products/' + id);
            $('#edit_product_id').val(id);
            $('#edit_product_name').val(btn.data('name'));
            $('#edit_product_category').val(btn.data('category'));
            $('#edit_product_price').val(btn.data('price'));
            $('#edit_product_sale_price').val(btn.data('sale_price'));
            $('#edit_product_stock').val(btn.data('stock'));
            $('#edit_product_status').val(btn.data('status'));
            $('#edit_product_description').val(btn.data('description'));
            $('#edit_product_sku').val(btn.data('sku'));
            $('#edit_product_tags').val(btn.data('tags'));
            $('#edit_product_sizes').val(btn.data('sizes'));
            $('#edit_meta_title').val(btn.data('meta_title'));
            $('#edit_meta_description').val(btn.data('meta_description'));
            // Bootstrap 5 fallback
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                var modal = new bootstrap.Modal(document.getElementById('editProductModal'));
                modal.show();
            } else {
                $('#editProductModal').modal('show');
            }
        });
            // Add Product Modal - multiple ways to ensure it works
    $('#addProductBtn').on('click', function(e) {
        e.preventDefault();
        console.log('Add Product button clicked');
        if ($('#addProductModal').length) {
            $('#addProductModal').modal('show');
                } else {
            alert('Modal not found!');
        }
    });
    
    // Also handle data-toggle clicks
    $('[data-toggle="modal"][data-target="#addProductModal"]').on('click', function(e) {
        e.preventDefault();
        console.log('Data-toggle Add Product clicked');
        $('#addProductModal').modal('show');
    });
    
    // SweetAlert2 confirm untuk delete
    $('.form-delete-product').on('submit', function(e){
        e.preventDefault();
        const form = this;
        Swal.fire({
          title: 'Are you sure?',
          text: 'This product will be deleted permanently!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
    });
    
    // Preview gambar utama di Add/Edit
    function previewImage(input, previewId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#' + previewId).attr('src', e.target.result).show();
            }
            reader.readAsDataURL(file);
        }
    }

    // Order detail modal
    $(document).on('click', '.btn-view-order', function() {
        const order = $(this).data('order');
        $('#orderDetailContent').html(`
            <table class="table table-bordered table-striped">
                <tr><th>Order #</th><td>${order.order_number}</td></tr>
                <tr><th>User ID</th><td>${order.user_id}</td></tr>
                <tr><th>Subtotal</th><td>Rp${Number(order.subtotal).toLocaleString()}</td></tr>
                <tr><th>Shipping Cost</th><td>Rp${Number(order.shipping_cost).toLocaleString()}</td></tr>
                <tr><th>Discount</th><td>Rp${Number(order.discount_amount).toLocaleString()}</td></tr>
                <tr><th>Total</th><td>Rp${Number(order.total_amount).toLocaleString()}</td></tr>
                <tr><th>Shipping Address</th><td>${order.shipping_address}</td></tr>
                <tr><th>Status</th><td>${order.status}</td></tr>
                <tr><th>Created At</th><td>${order.created_at}</td></tr>
                <tr><th>Updated At</th><td>${order.updated_at}</td></tr>
            </table>
        `);
        $('#orderDetailModal').modal('show');
    });

    // User detail modal
    $(document).on('click', '.btn-view-user', function() {
        const user = $(this).data('user');
        $('#userDetailContent').html(`
            <strong>Name:</strong> ${user.first_name} ${user.last_name}<br>
            <strong>Email:</strong> ${user.email}<br>
            <strong>Role:</strong> ${user.is_admin ? 'Admin' : 'Customer'}<br>
        `);
        $('#userDetailModal').modal('show');
    });
        });
    </script>
    @if(session('success'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '{{ session('success') }}',
      timer: 2000,
      showConfirmButton: false
    });
    </script>
    @endif
    @if(session('error'))
    <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '{{ session('error') }}',
      timer: 2000,
      showConfirmButton: false
    });
    </script>
    @endif
    <script>
    $(function() {
        // Deteksi tab aktif dari hash
        var activeTab = window.location.hash.replace('#','');
        if (activeTab) {
            // Untuk setiap tab yang ada paginasi
            ['orders','users','products'].forEach(function(tab) {
                $('#tab-' + tab + ' .pagination a').each(function() {
                    var href = $(this).attr('href');
                    if (href && href.indexOf('#') === -1) {
                        $(this).attr('href', href + '#' + tab);
                    }
                });
            });
        }
    });
    </script>
</body>
</html>