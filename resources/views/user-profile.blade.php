<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DariMata Studio - Customer Dashboard">
    <meta name="keywords" content="DariMata, Fashion, E-commerce, Dashboard, Account">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DariMata Studio - My Account</title>

    <!-- Google Font: Nunito Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">

    <style>
        :root {
            --primary-color: #0118d8;
            --secondary-color: #e53637;
            --text-color: #111;
            --text-light-color: #777;
            --border-color: #eee;
            --light-gray-color: #f9f9f9;
            --border-radius: 8px;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        /* Dashboard Layout */
        .dashboard {
            padding: 2rem 0;
            background-color: var(--light-gray-color);
            min-height: calc(100vh - 120px);
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 1.5rem;
            padding: 1rem 0;
        }

        /* Sidebar */
        .dashboard-sidebar {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            position: sticky;
            top: 100px;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .dashboard-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .dashboard-sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 3px;
        }

        .user-profile {
            text-align: center;
            padding: 1rem 0 1.5rem;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 1rem;
        }

        .user-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0118D8, #00B4D8);
            color: #fff;
            font-size: 2.5rem;
            font-weight: 700;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 3px solid #fff;
            box-shadow: 0 5px 15px rgba(1, 24, 216, 0.1);
            margin: 0 auto 1rem;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.25rem;
        }

        .user-email {
            color: var(--text-light-color);
            font-size: 0.85rem;
        }

        /* Sidebar vertikal (kebawah) */
        .dashboard-menu {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(1,24,216,0.04);
            margin-bottom: 2rem;
            padding: 0.5rem 0;
            gap: 0.2rem;
            min-width: 180px;
            max-width: 220px;
        }
        .dashboard-menu li {
            margin: 0;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s;
            text-align: left;
        }
        .dashboard-menu li a {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 0.7rem;
            padding: 0.8rem 1.2rem;
            color: #888;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 8px;
            transition: color 0.2s, background 0.2s;
            background: none;
        }
        .dashboard-menu li.active,
        .dashboard-menu li a:focus,
        .dashboard-menu li a:hover {
            background: var(--primary-color, #0118d8);
            color: #fff;
        }
        .dashboard-menu li.active a,
        .dashboard-menu li a:focus,
        .dashboard-menu li a:hover {
            color: #fff;
        }
        .dashboard-menu li a i {
            font-size: 1.2rem;
            color: inherit;
            transition: color 0.2s;
        }
        @media (max-width: 991px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }
            .dashboard-menu {
                flex-direction: row;
                min-width: 0;
                max-width: 100%;
                overflow-x: auto;
                margin-bottom: 1rem;
            }
            .dashboard-menu li a {
                flex-direction: column;
                align-items: center;
                font-size: 0.95rem;
                padding: 0.7rem 0.5rem;
            }
        }
        /* Tab Content Animation */
        .tab-content {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s, transform 0.3s;
        }
        .tab-content.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
            animation: fadeInTab 0.3s;
        }
        @keyframes fadeInTab {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Dashboard Content */
        .dashboard-content {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .dashboard-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-color);
            margin: 0;
        }

        .dashboard-subtitle {
            color: var(--text-light-color);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* Dashboard Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .stats-card__icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: white;
        }

        .stats-card__icon.orders {
            background: linear-gradient(135deg, var(--primary-color), #3a4bff);
        }

        .stats-card__icon.wishlist {
            background: linear-gradient(135deg, #ff4d4d, #ff6b6b);
        }

        .stats-card__icon.points {
            background: linear-gradient(135deg, #4CAF50, #66BB6A);
        }

        .stats-card__icon.wallet {
            background: linear-gradient(135deg, #FF9800, #FFA726);
        }

        .stats-card__title {
            font-size: 0.9rem;
            color: var(--text-light-color);
            margin-bottom: 0.5rem;
        }

        .stats-card__value {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-color);
            margin: 0;
        }

        /* Recent Orders */
        .orders-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        .orders-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            background-color: var(--light-gray-color);
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--text-color);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .orders-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .order-id {
            font-weight: 600;
            color: var(--primary-color);
        }

        .order-date {
            color: var(--text-light-color);
            font-size: 0.85rem;
        }

        .order-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .status-pending {
            background-color: #FFF3E0;
            color: #E65100;
        }

        .status-processing {
            background-color: #E3F2FD;
            color: #1565C0;
        }

        .status-shipped {
            background-color: #E8F5E9;
            color: #2E7D32;
        }

        .status-delivered {
            background-color: #E0F7FA;
            color: #00838F;
        }

        .status-cancelled {
            background-color: #FFEBEE;
            color: #C62828;
        }

        .order-action {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .order-action:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        /* Address Cards */
        .address-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .address-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
        }

        .address-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .address-card__title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .address-card__title .badge {
            margin-left: 0.75rem;
            background: var(--primary-color);
            color: white;
            font-size: 0.7rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
        }

        .address-card__details p {
            margin: 0.5rem 0;
            color: var(--text-color);
            font-size: 0.9rem;
        }

        .address-card__details p strong {
            font-weight: 600;
        }

        .address-card__actions {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-top: 10px;
        }

        /* Modern Address Action Buttons */
        .address-btn.edit {
            background: #fff;
            color: #0118d8;
            border: 1.5px solid #0118d8;
            border-radius: 6px;
            padding: 5px 18px;
            font-weight: 600;
            margin-right: 6px;
            transition: all 0.2s;
        }
        .address-btn.edit:hover {
            background: #0118d8;
            color: #fff;
        }
        .address-btn.delete {
            background: #fff;
            color: #e74c3c;
            border: 1.5px solid #e74c3c;
            border-radius: 6px;
            padding: 5px 18px;
            font-weight: 600;
            margin-right: 6px;
            transition: all 0.2s;
        }
        .address-btn.delete:hover {
            background: #e74c3c;
            color: #fff;
        }
        .address-btn.default {
            background: #0118d8;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 5px 18px;
            font-weight: 600;
            margin-right: 0;
            cursor: default;
        }

        /* Modal Styles */
        .edit-address-modal {
            display: none;
            position: absolute;
            z-index: 99;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
            width: 100%;
            background: rgba(0,0,0,0.08);
            align-items: flex-start;
            justify-content: center;
        }
        .edit-address-modal.active {
            display: flex;
            animation: fadeInModal 0.25s;
        }
        @keyframes fadeInModal {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .edit-address-modal-content {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            padding: 32px 28px 24px 28px;
            min-width: 320px;
            max-width: 95vw;
            width: 100%;
            max-width: 400px;
            position: relative;
            margin: 24px auto 0 auto;
            display: flex;
            flex-direction: column;
            animation: modalPopIn 0.25s;
        }
        @keyframes modalPopIn {
            from { transform: translateY(40px) scale(0.97); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }
        @media (max-width: 600px) {
            .edit-address-modal-content {
                min-width: 90vw;
                padding: 18px 8px 16px 8px;
            }
        }
        .edit-address-modal-close {
            position: absolute;
            top: 16px;
            right: 18px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #888;
            cursor: pointer;
            transition: color 0.2s;
        }
        .edit-address-modal-close:hover {
            color: #e74c3c;
        }

        /* Wishlist Items */
        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .wishlist-item {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
        }

        .wishlist-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .wishlist-item__image {
            height: 180px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #f8f8f8;
            position: relative;
        }

        .wishlist-item__actions {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            opacity: 0;
            transform: translateY(8px);
            transition: var(--transition);
            z-index: 3;
        }

        .wishlist-item:hover .wishlist-item__actions {
            opacity: 1;
            transform: translateY(0);
        }

        .wishlist-item__actions li {
            margin-bottom: 0.4rem;
            list-style: none;
        }

        .wishlist-item__actions li a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            color: var(--text-light-color);
            font-size: 0.9rem;
        }

        .wishlist-item__actions li a:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.05);
        }

        .wishlist-item__content {
            padding: 1rem;
        }

        .wishlist-item__title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            transition: var(--transition);
            line-height: 1.35;
        }

        .wishlist-item:hover .wishlist-item__title {
            color: var(--primary-color);
        }

        .wishlist-item__price {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-color);
            margin: 0;
        }

        .wishlist-item__old-price {
            text-decoration: line-through;
            color: #b7b7b7;
            font-size: 0.8rem;
            margin-right: 0.4rem;
        }

        .wishlist-item__rating {
            color: #f7941d;
            font-size: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .wishlist-item__actions-row {
            display: flex;
            gap: 0.75rem;
            margin-top: 0.75rem;
        }

        .wishlist-add-to-cart {
            flex-grow: 1;
            padding: 0.5rem;
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: var(--border-radius);
            font-size: 0.8rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: var(--transition);
        }

        .wishlist-add-to-cart:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Form Styles */
        .dashboard-form {
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(1, 24, 216, 0.1);
            outline: none;
        }

        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            transition: var(--transition);
            background-color: white;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(1, 24, 216, 0.1);
            outline: none;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #0018a8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(1, 24, 216, 0.2);
        }

        .btn-outline {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

        .btn-outline:hover {
            background-color: rgba(1, 24, 216, 0.05);
            transform: translateY(-2px);
        }

        .password-strength {
            margin-top: 0.5rem;
            height: 6px;
            background: #eee;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            background: #ddd;
            transition: width 0.3s ease;
        }

        .password-hints {
            margin-top: 1rem;
            padding: 1rem;
            background: rgba(1, 24, 216, 0.03);
            border-radius: var(--border-radius);
            border-left: 4px solid var(--primary-color);
            font-size: 0.85rem;
        }

        .password-hints ul {
            margin: 0;
            padding-left: 1.25rem;
        }

        .password-hints li {
            margin-bottom: 0.5rem;
            color: var(--text-light-color);
        }

        .password-hints li i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            background-color: #fff;
            border-radius: var(--border-radius);
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            margin: 1rem 0;
        }

        .empty-state img {
            max-width: 180px;
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-state h4 {
            font-size: 1.1rem;
            color: var(--text-color);
            margin-bottom: 0.75rem;
        }

        .empty-state p {
            color: var(--text-light-color);
            margin-bottom: 1.25rem;
            max-width: 350px;
            margin-left: auto;
            margin-right: auto;
            font-size: 0.9rem;
        }

        .empty-state .btn {
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
        }

        .empty-state .btn:hover {
            background-color: var(--secondary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .dashboard-sidebar {
                position: static;
                margin-bottom: 1.5rem;
                max-height: none;
            }

            .stats-cards {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            }

            .wishlist-grid {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            }

            .address-cards {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
        }

        @media (max-width: 767px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .stats-cards {
                grid-template-columns: 1fr 1fr;
            }

            .orders-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .wishlist-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }

            .address-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .stats-cards {
                grid-template-columns: 1fr;
            }

            .wishlist-grid {
                grid-template-columns: 1fr 1fr;
            }

            .wishlist-item__image {
                height: 140px;
            }

            .address-card__actions {
                flex-direction: column;
            }

            .address-btn {
                width: 100%;
            }
        }

        .address-card {
            position: relative;
        }
        .address-badge-default {
            position: absolute;
            right: 16px;
            bottom: 12px;
            background: #0118d8;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 12px;
            padding: 3px 14px;
            box-shadow: 0 2px 8px rgba(1,24,216,0.08);
            letter-spacing: 0.5px;
            z-index: 2;
            border: none;
            cursor: default;
        }

        /* Modern Table for Order History */
        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            overflow: hidden;
            font-size: 1rem;
        }
        .modern-table th, .modern-table td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }
        .modern-table th {
            background: #f8f9fa;
            font-weight: 700;
            color: #222;
            letter-spacing: 0.5px;
        }
        .modern-table tr:last-child td {
            border-bottom: none;
        }
        .modern-table tbody tr:hover {
            background: #f6f8ff;
            transition: background 0.2s;
        }
        .modern-table .badge {
            font-size: 0.92em;
            padding: 0.45em 1em;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.2px;
        }
        .modern-table ul {
            margin: 0;
            padding-left: 18px;
        }
        .modern-table .btn {
            font-size: 0.95em;
            border-radius: 8px;
            padding: 0.35em 1.1em;
        }
        .modern-table input[type="text"],
        .modern-table input[type="file"] {
            font-size: 0.95em;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            padding: 0.3em 0.7em;
            margin-bottom: 0.3em;
        }
        @media (max-width: 900px) {
            .modern-table th, .modern-table td { padding: 0.7rem 0.5rem; font-size: 0.97em; }
        }
        @media (max-width: 600px) {
            .modern-table, .modern-table thead, .modern-table tbody, .modern-table th, .modern-table td, .modern-table tr {
                display: block;
            }
            .modern-table thead { display: none; }
            .modern-table tr { margin-bottom: 1.2em; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
            .modern-table td { border: none; position: relative; padding-left: 50%; min-height: 38px; }
            .modern-table td:before {
                position: absolute;
                left: 1rem;
                top: 50%;
                transform: translateY(-50%);
                font-weight: 700;
                color: #888;
                font-size: 0.97em;
                content: attr(data-label);
            }
        }
    </style>
</head>

<body>
    <!-- Header (Sama seperti shop2) -->
    @include('partials.header')

    <!-- Mobile Navigation (Sama seperti shop2) -->
    <div class="mobile-nav" id="mobileNav">
        <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close menu">&times;</button>
        <form class="header-search mobile-search" action="/search" method="GET" style="margin: 20px 0; width: 100%;">
            <input type="search" name="q" placeholder="Search products..." aria-label="Search">
            <button type="submit" aria-label="Submit search"><i class="fas fa-search"></i></button>
        </form>
        <ul>
            <li><a href="/">Home</a></li>
            <li class="active"><a href="shop2">Shop</a></li>
            <li><a href="about">About Us</a></li>
            <li><a href="contact">Contact</a></li>
            <li>
                <hr style="margin: 15px 0; border-color: var(--border-color);">
            </li>
            <li><a href="user-profile">My Account</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>

    <!-- Breadcrumb -->
    <section class="breadcrumb-shop"
        style="background-color: var(--light-gray-color); padding: 25px 0; border-bottom: 1px solid var(--border-color);">
        <div class="container">
            <div class="breadcrumb-text" style="text-align: left;">
                <div class="breadcrumb-links" style="font-size: 0.9rem;">
                    <a href="/" style="color: var(--text-light-color);">Home</a>
                    <span style="margin: 0 8px; color: var(--text-light-color);">/</span>
                    <span style="color: var(--text-color); font-weight: 500;">My Account</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Section -->
    <section class="dashboard">
        <div class="container">
            <div class="dashboard-container">
                <!-- Sidebar -->
                <aside class="dashboard-sidebar">
                    <div class="user-profile">
                        <div class="user-avatar" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #0118D8, #00B4D8); color: #fff; font-size: 2.5rem; font-weight: 700; border-radius: 50%; width: 100px; height: 100px; border: 3px solid #fff; box-shadow: 0 5px 15px rgba(1, 24, 216, 0.1); margin: 0 auto 1rem;">
                            {{ strtoupper(substr($user->first_name, 0, 2)) }}
                        </div>
                        <h3 class="user-name">{{ $user->first_name }} {{ $user->last_name }}</h3>
                        {{-- PERBAIKAN 1: Gunakan notasi objek -> --}}
                        <p class="user-email">{{ $user->email }}</p>
                    </div>
                    <ul class="dashboard-menu">
                        <li class="{{ request('tab', 'dashboard') == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('user-profile', ['tab' => 'dashboard']) }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ request('tab') == 'returns' ? 'active' : '' }}">
                            <a href="{{ route('user-profile', ['tab' => 'returns']) }}"><i class="fas fa-undo"></i><span>Return Product</span></a>
                        </li>
                        <li class="{{ request('tab') == 'wishlist' ? 'active' : '' }}">
                            <a href="{{ route('user-profile', ['tab' => 'wishlist']) }}"><i class="fas fa-heart"></i><span>Wishlist</span></a>
                        </li>
                        <li class="{{ request('tab') == 'addresses' ? 'active' : '' }}">
                            <a href="{{ route('user-profile', ['tab' => 'addresses']) }}"><i class="fas fa-map-marker-alt"></i><span>Addresses</span></a>
                        </li>
                        <li class="{{ request('tab') == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('user-profile', ['tab' => 'profile']) }}"><i class="fas fa-user"></i><span>Profile</span></a>
                        </li>
                        <li class="{{ request('tab') == 'password' ? 'active' : '' }}">
                            <a href="{{ route('user-profile', ['tab' => 'password']) }}"><i class="fas fa-lock"></i><span>Password</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </aside>

                <!-- Main Content -->
                <main class="dashboard-content">
                    @php
                        $tab = request('tab', 'dashboard');
                    @endphp
                    @if($tab == 'dashboard')
                        <div id="dashboard" class="tab-content active">
                            <div class="dashboard-header">
                                <div>
                                    <h2 class="dashboard-title">Dashboard</h2>
                                    <p class="dashboard-subtitle">Welcome back, {{ $user->first_name }}!</p>
                                </div>
                                <a href="{{ route('shop2') }}" class="btn btn-primary">Continue Shopping</a>
                            </div>
                            <div class="stats-cards">
                                <div class="stats-card">
                                    <div class="stats-card__icon orders"><i class="fas fa-shopping-bag"></i></div>
                                    <p class="stats-card__title">Total Orders</p>
                                    <h3 class="stats-card__value">{{ count($orders) }}</h3>
                                </div>
                                <div class="stats-card">
                                    <div class="stats-card__icon wishlist"><i class="fas fa-heart"></i></div>
                                    <p class="stats-card__title">Wishlist Items</p>
                                    <h3 class="stats-card__value">{{ is_countable($wishlist) ? count($wishlist) : 0 }}</h3>
                                </div>
                            </div>
                            <h3 style="margin-bottom: 1.5rem;">Recent Orders</h3>
                            <div class="table-responsive">
                                <table class="orders-table">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders->take(3) as $order)
                                        <tr>
                                            <td><span class="order-id">#ORD-{{ $order->id }}</span></td>
                                            <td><span class="order-date">{{ $order->created_at->format('M d, Y') }}</span></td>
                                            <td><span class="order-status status-{{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span></td>
                                            <td>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('invoice', ['order' => $order->id]) }}" class="order-action" target="_blank">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="5">No orders found.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <a href="#orders" class="btn btn-outline" style="margin-top: 1rem;">View All Orders</a>
                        </div>
                    @elseif($tab == 'returns')
                        <div id="returns" class="tab-content active">
                            <div class="dashboard-header">
                                <div>
                                    <h2 class="dashboard-title">Retur Barang</h2>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="modern-table">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($returns as $retur)
                                        <tr>
                                            <td data-label="Order #">{{ $retur->order->order_number ?? '-' }}</td>
                                            <td data-label="Tanggal Retur">{{ $retur->created_at->format('d M Y') }}</td>
                                            <td data-label="Status">
                                                @php
                                                    $status = strtolower($retur->status);
                                                    $badge = 'secondary';
                                                    if($status === 'pending') $badge = 'primary';
                                                    elseif($status === 'approved') $badge = 'info';
                                                    elseif($status === 'completed') $badge = 'success';
                                                    elseif($status === 'rejected') $badge = 'danger';
                                                @endphp
                                                <span class="badge bg-{{ $badge }}">{{ ucfirst($retur->status) }}</span>
                                            </td>
                                            <td data-label="Alasan">{{ $retur->reason }}</td>
                                            <td data-label="Aksi">
                                                @if($retur->status === 'approved' && !$retur->resi)
                                                    <form action="#" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="resi" placeholder="Nomor Resi Pengembalian" required class="form-control form-control-sm mb-1" style="width:140px;display:inline-block;">
                                                        <button type="submit" class="btn btn-info btn-sm">Upload Note</button>
                                                    </form>
                                                @elseif($retur->status === 'completed')
                                                    <span class="badge bg-success">Return Finish</span>
                                                @else
                                                    <span>-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5">
                                                <img src="{{ asset('img/empty-box.png') }}" alt="No returns" style="max-width:80px;opacity:0.5;"><br>
                                                <span class="text-muted">Dont have return product.</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @elseif($tab == 'wishlist')
                        <div id="wishlist" class="tab-content active">
                            <div class="dashboard-header">
                                <div>
                                    <h2 class="dashboard-title">My Wishlist</h2>
                                    <p class="dashboard-subtitle">Your saved items</p>
                                </div>
                            </div>
                            <div class="wishlist-grid">
                                @forelse($wishlist as $item)
                                    <div class="wishlist-item">
                                        <div class="wishlist-item__image" style="background-image: url('{{ $item->product->primaryImage->image_path ?? 'img/default.png' }}');"></div>
                                        <div class="wishlist-item__content">
                                            <h3 class="wishlist-item__title">
                                                <a href="{{ route('product.details', $item->product_id) }}">{{ $item->product->name }}</a>
                                            </h3>
                                            <p class="wishlist-item__price">Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                                            <div class="wishlist-item__actions-row">
                                                <a href="#" class="wishlist-add-to-cart">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No wishlist items.</p>
                                @endforelse
                            </div>
                        </div>
                    @elseif($tab == 'addresses')
                        <div id="addresses" class="tab-content active">
                            <div class="dashboard-header">
                                <div>
                                    <h2 class="dashboard-title">My Addresses</h2>
                                    <p class="dashboard-subtitle">Manage your shipping addresses</p>
                                </div>
                                <button class="btn btn-primary" id="addNewAddressBtn">Add New Address</button>
                            </div>
                            <div class="address-cards">
                                @forelse($addresses as $address)
                                    <div class="address-card" style="position:relative;">
                                        <h3 class="address-card__title">{{ $address->address_name ?? $address->address }}</h3>
                                        <div class="address-card__details">
                                            <p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
                                            <p>{{ $address->full_address ?? $address->address }}</p>
                                            <p>{{ $address->city }}, {{ $address->province }}, {{ $address->postal_code }}</p>
                                            <p>{{ $address->country ?? '' }}</p>
                                            <p><strong>Phone:</strong> {{ $user->phone_number }}</p>
                                        </div>
                                        <div class="address-card__actions" style="display: flex; gap: 8px; align-items: center; margin-top: 10px;">
                                            <button type="button" class="address-btn edit" onclick="showEditAddressModal({{ $address->id }})">Edit</button>
                                            <form method="POST" action="{{ route('user-profile.address.delete', $address->id) }}" style="display:inline;" onsubmit="return confirm('Hapus alamat ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="address-btn delete">Delete</button>
                                            </form>
                                        </div>
                                        @if($address->is_default)
                                            <span class="address-badge-default">Default</span>
                                        @endif
                                        <!-- Edit Address Modal (floating above this card) -->
                                        <div class="edit-address-modal" id="editAddressModal{{ $address->id }}">
                                            <div class="edit-address-modal-content">
                                                <button class="edit-address-modal-close" onclick="hideEditAddressModal({{ $address->id }})">&times;</button>
                                                <h3 style="margin-bottom: 1.5rem;">Edit Address</h3>
                                                <form method="POST" action="{{ route('user-profile.address.update', $address->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label class="form-label" for="edit_address_name_{{ $address->id }}">Address Title</label>
                                                        <input type="text" class="form-control" name="address_name" id="edit_address_name_{{ $address->id }}" value="{{ $address->address_name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="edit_full_address_{{ $address->id }}">Full Address</label>
                                                        <input type="text" class="form-control" name="full_address" id="edit_full_address_{{ $address->id }}" value="{{ $address->full_address }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="edit_city_{{ $address->id }}">City</label>
                                                        <input type="text" class="form-control" name="city" id="edit_city_{{ $address->id }}" value="{{ $address->city }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="edit_province_{{ $address->id }}">Province</label>
                                                        <input type="text" class="form-control" name="province" id="edit_province_{{ $address->id }}" value="{{ $address->province }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="edit_postal_code_{{ $address->id }}">Postal Code</label>
                                                        <input type="text" class="form-control" name="postal_code" id="edit_postal_code_{{ $address->id }}" value="{{ $address->postal_code }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="is_default" id="edit_setAsDefault_{{ $address->id }}" value="1" {{ $address->is_default ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="edit_setAsDefault_{{ $address->id }}">Set as default address</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-top: 1.5rem; display: flex; gap: 8px;">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        <button type="button" class="btn btn-outline" onclick="hideEditAddressModal({{ $address->id }})">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No addresses found.</p>
                                @endforelse
                            </div>

                            {{-- Tambahkan di dalam tab addresses --}}
                            <div id="addAddressForm" style="display:none; margin-bottom:2rem;">
                                <form method="POST" action="{{ route('user-profile.address.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="address_name">Address Title</label>
                                        <input type="text" class="form-control" name="address_name" id="address_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="full_address">Full Address</label>
                                        <input type="text" class="form-control" name="full_address" id="full_address" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" class="form-control" name="city" id="city" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="province">Province</label>
                                        <input type="text" class="form-control" name="province" id="province" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="postal_code">Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" id="postal_code" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="is_default" id="setAsDefault" value="1">
                                            <label class="form-check-label" for="setAsDefault">Set as default address</label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 1.5rem; display: flex; gap: 8px;">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-outline" id="cancelAddAddress">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @elseif($tab == 'profile')
                        <div id="profile" class="tab-content active">
                            <div class="dashboard-header">
                                <div>
                                    <h2 class="dashboard-title">Profile Information</h2>
                                    <p class="dashboard-subtitle">Update your account's profile information</p>
                                </div>
                            </div>
                            <div class="dashboard-form">
                                <form method="POST" action="{{ route('user-profile.update') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone_number">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                                    </div>
                                    <div class="form-group" style="margin-top: 1.5rem;">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @elseif($tab == 'password')
                        <div id="password" class="tab-content active">
                            <div class="dashboard-header">
                                <div>
                                    <h2 class="dashboard-title">Update Password</h2>
                                    <p class="dashboard-subtitle">Ensure your account is using a long, random password to stay secure.</p>
                                </div>
                            </div>
                            <div class="dashboard-form">
                                <form method="POST" action="{{ route('user-profile.password') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="password">New Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                    </div>
                                    <div class="form-group" style="margin-top: 1.5rem;">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </main>
            </div>
        </div>
    </section>

    <!-- Footer (Sama seperti /.html) -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-widget">
                    <h5>About Us</h5>
                    <p>DariMata Studio is dedicated to bringing you unique and stylish fashion pieces that inspire
                        confidence.</p>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div class="footer-widget">
                    <h5>Shop</h5>
                    <ul>
                        <li><a href="shop2?category=new-arrivals">New Arrivals</a></li>
                        <li><a href="shop2?category=clothing">Clothing</a></li>
                        <li><a href="shop2?category=accessories">Accessories</a></li>
                        <li><a href="shop2?category=sale">Sale</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h5>Customer Service</h5>
                    <ul>
                        <li><a href="contact">Contact Us</a></li>
                        <li><a href="#">Shipping & Returns</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Size Guide</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h5>Newsletter</h5>
                    <p>Subscribe to our newsletter for the latest updates and promotions.</p>
                    <form action="#" method="post" style="display: flex; margin-top: 10px;">
                        <input type="email" name="email" placeholder="Your Email" required
                            style="flex-grow: 1; padding: 8px; border: 1px solid rgba(255,255,255,0.2); border-radius: 3px 0 0 3px; background: rgba(255,255,255,0.1); color: #fff;">
                        <button type="submit" class="btn"
                            style="border-radius: 0 3px 3px 0; padding: 8px 12px; background: #fff; color: var(--primary-color); text-transform: capitalize; font-weight: 600;">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <span id="currentYearFooter"></span> DariMata Studio. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Modal Resi -->
    <div id="resiModal" style="display:none; position:fixed; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.25); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#fff; border-radius:12px; max-width:90vw; min-width:320px; padding:32px 24px; box-shadow:0 8px 32px rgba(0,0,0,0.18); position:relative; text-align:center;">
            <button onclick="hideResiModal()" style="position:absolute; top:12px; right:18px; background:none; border:none; font-size:1.5rem; color:#888; cursor:pointer;">&times;</button>
            <h2 style="margin-bottom:1.2rem;">Nomor Resi</h2>
            <div style="font-size:1.2rem; font-weight:700; margin-bottom:0.5rem;" id="resiModalValue">-</div>
            <div style="font-size:0.95rem; color:#888;">Order: <span id="resiModalOrderNumber">-</span></div>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileNav = document.getElementById('mobileNav');
        const mobileNavOverlay = document.getElementById('mobileNavOverlay');
        const mobileNavClose = document.getElementById('mobileNavClose');

        if (mobileMenuToggle && mobileNav && mobileNavOverlay && mobileNavClose) {
            mobileMenuToggle.addEventListener('click', () => {
                mobileNav.classList.add('active');
                mobileNavOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            mobileNavClose.addEventListener('click', () => {
                mobileNav.classList.remove('active');
                mobileNavOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });

            mobileNavOverlay.addEventListener('click', () => {
                mobileNav.classList.remove('active');
                mobileNavOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        // Profile Dropdown (PERBAIKAN)
        const profileTrigger = document.getElementById('profileTrigger');
        const profileDropdown = document.getElementById('profileDropdown');
        if (profileTrigger && profileDropdown) {
            profileTrigger.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('show');
            });
            // Tutup dropdown jika klik di luar
            document.addEventListener('click', function(e) {
                if (!profileDropdown.contains(e.target) && e.target !== profileTrigger) {
                    profileDropdown.classList.remove('show');
                }
            });
        }

        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        if (backToTop) {
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });

            backToTop.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Address Form Toggle
        const addNewAddressBtn = document.getElementById('addNewAddressBtn');
        const cancelAddAddress = document.getElementById('cancelAddAddress');
        const addAddressForm = document.getElementById('addAddressForm');

        if (addNewAddressBtn && cancelAddAddress && addAddressForm) {
            addNewAddressBtn.addEventListener('click', () => {
                addAddressForm.style.display = 'block';
                window.scrollTo({
                    top: addAddressForm.offsetTop - 20,
                    behavior: 'smooth'
                });
            });

            cancelAddAddress.addEventListener('click', () => {
                addAddressForm.style.display = 'none';
            });
        }

        // Password Strength Indicator
        const newPasswordInput = document.getElementById('newPassword');
        const passwordStrengthBar = document.getElementById('passwordStrengthBar');

        if (newPasswordInput && passwordStrengthBar) {
            newPasswordInput.addEventListener('input', function () {
                const password = this.value;
                let strength = 0;

                // Check length
                if (password.length >= 8) strength += 25;

                // Check for uppercase letters
                if (/[A-Z]/.test(password)) strength += 25;

                // Check for numbers
                if (/[0-9]/.test(password)) strength += 25;

                // Check for special characters
                if (/[^A-Za-z0-9]/.test(password)) strength += 25;

                // Update strength bar
                passwordStrengthBar.style.width = strength + '%';

                // Update color based on strength
                if (strength < 50) {
                    passwordStrengthBar.style.backgroundColor = '#e53935'; // Red
                } else if (strength < 75) {
                    passwordStrengthBar.style.backgroundColor = '#fb8c00'; // Orange
                } else {
                    passwordStrengthBar.style.backgroundColor = '#43a047'; // Green
                }
            });
        }

        function showEditAddressModal(id) {
            document.getElementById('editAddressModal' + id).classList.add('active');
        }
        function hideEditAddressModal(id) {
            document.getElementById('editAddressModal' + id).classList.remove('active');
        }

        function showResiModal(resi, orderNumber) {
            document.getElementById('resiModalValue').innerText = resi || '-';
            document.getElementById('resiModalOrderNumber').innerText = orderNumber || '-';
            document.getElementById('resiModal').style.display = 'flex';
        }
        function hideResiModal() {
            document.getElementById('resiModal').style.display = 'none';
        }
    </script>
</body>

</html>