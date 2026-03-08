<?php
include "connection/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .sidebar-header h3,
        .sidebar.collapsed .menu-text,
        .sidebar.collapsed .submenu {
            display: none;
        }

        .sidebar.collapsed .menu-icon {
            margin-right: 0;
            font-size: 1.2rem;
        }

        .sidebar.collapsed .sidebar-nav a {
            justify-content: center;
            padding: 15px 0;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .sidebar-header p {
            margin: 5px 0 0;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* Sidebar Navigation */
        .sidebar-nav {
            padding: 20px 0;
            list-style: none;
        }

        .sidebar-nav li {
            margin-bottom: 5px;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            white-space: nowrap;
            border-left: 3px solid transparent;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-left-color: #fff;
        }

        .menu-icon {
            margin-right: 15px;
            font-size: 1.1rem;
            min-width: 20px;
        }

        .menu-text {
            flex: 1;
        }

        .arrow-icon {
            font-size: 0.8rem;
            transition: transform 0.3s;
        }

        /* Submenu */
        .submenu {
            list-style: none;
            padding-left: 48px;
            background: rgba(0, 0, 0, 0.1);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .submenu.show {
            max-height: 300px;
        }

        .submenu a {
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .rotate {
            transform: rotate(90deg);
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        /* Top Navbar */
        .navbar {
            background: #fff;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-left {
            display: flex;
            align-items: center;
        }

        .toggle-sidebar {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #667eea;
            cursor: pointer;
            margin-right: 20px;
            padding: 5px;
        }

        .toggle-sidebar:hover {
            color: #764ba2;
        }

        .page-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-icon {
            position: relative;
            color: #666;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #667eea;
            color: #fff;
            font-size: 0.7rem;
            padding: 2px 5px;
            border-radius: 10px;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
        }

        .user-info {
            display: none;
        }

        @media (min-width: 768px) {
            .user-info {
                display: block;
            }

            .user-name {
                font-size: 0.9rem;
                font-weight: 600;
                color: #333;
                margin: 0;
            }

            .user-role {
                font-size: 0.7rem;
                color: #666;
                margin: 0;
            }
        }

        /* Dashboard Content */
        .content {
            padding: 25px;
        }

        /* Cards */
        .stats-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stats-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .stats-title {
            font-size: 0.9rem;
            color: #666;
            margin: 5px 0 0;
        }

        /* Tables */
        .table-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 600;
            color: #333;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #666;
        }

        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .action-btn {
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            background: none;
            color: #666;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background: #f4f6f9;
            color: #667eea;
        }

        /* Charts */
        .chart-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            height: 300px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                left: -260px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.expanded {
                margin-left: 0;
            }

            .sidebar.collapsed {
                left: -70px;
            }

            .sidebar.collapsed.active {
                left: 0;
            }
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .quick-action-btn {
            flex: 1;
            min-width: 120px;
            padding: 15px;
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .quick-action-btn:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border-color: transparent;
        }

        .quick-action-btn i {
            font-size: 1.5rem;
            margin-bottom: 5px;
            color: #667eea;
        }

        .quick-action-btn:hover i {
            color: #fff;
        }

        .quick-action-btn span {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>AdminPanel</h3>
            <p>v1.0.0</p>
        </div>

        <ul class="sidebar-nav">
            <li>
                <a href="#" class="active">
                    <i class="fas fa-dashboard menu-icon"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <!-- <li>
                <a href="#" onclick="toggleSubmenu('analytics-submenu')">
                    <i class="fas fa-chart-line menu-icon"></i>
                    <span class="menu-text">Analytics</span>
                    <i class="fas fa-chevron-right arrow-icon" id="analytics-arrow"></i>
                </a>
                <ul class="submenu" id="analytics-submenu">
                    <li><a href="#">Overview</a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Traffic</a></li>
                </ul>
            </li> -->

            <li>
                <a href="#" onclick="toggleSubmenu('users-submenu')">
                    <i class="fas fa-box menu-icon"></i>
                    <span class="menu-text">Products</span>
                    <i class="fas fa-chevron-right arrow-icon" id="users-arrow"></i>
                </a>
                <ul class="submenu" id="users-submenu">
                    <li><a href="products.php">All Products</a></li>
                    <!-- <li><a href="#">Add New</a></li>
                    <li><a href="#">Roles</a></li>
                    <li><a href="#">Permissions</a></li> -->
                </ul>
            </li>

            <li>
                <a href="#" onclick="toggleSubmenu('content-submenu')">
                    <i class="fas fa-file-alt menu-icon"></i>
                    <span class="menu-text">Sales</span>
                    <i class="fas fa-chevron-right arrow-icon" id="content-arrow"></i>
                </a>
                <ul class="submenu" id="content-submenu">
                    <li><a href="sales.php">All Sales</a></li>
                    <li><a href="sales_history.php">History</a></li>
                    <!-- <li><a href="#">Media</a></li>
                    <li><a href="#">Categories</a></li> -->
                </ul>
            </li>

            <!-- <li>
                <a href="#" onclick="toggleSubmenu('ecommerce-submenu')">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-text">E-Commerce</span>
                    <i class="fas fa-chevron-right arrow-icon" id="ecommerce-arrow"></i>
                </a>
                <ul class="submenu" id="ecommerce-submenu">
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Customers</a></li>
                    <li><a href="#">Inventory</a></li>
                </ul>
            </li> -->

            <!-- <li>
                <a href="#" onclick="toggleSubmenu('settings-submenu')">
                    <i class="fas fa-cog menu-icon"></i>
                    <span class="menu-text">Settings</span>
                    <i class="fas fa-chevron-right arrow-icon" id="settings-arrow"></i>
                </a>
                <ul class="submenu" id="settings-submenu">
                    <li><a href="#">General</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Email</a></li>
                    <li><a href="#">Backup</a></li>
                </ul>
            </li> -->

            <!-- <li>
                <a href="#">
                    <i class="fas fa-calendar menu-icon"></i>
                    <span class="menu-text">Calendar</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="#">
                    <i class="fas fa-envelope menu-icon"></i>
                    <span class="menu-text">Messages</span>
                    <span class="badge bg-danger">3</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-bell menu-icon"></i>
                    <span class="menu-text">Notifications</span>
                    <span class="badge bg-warning">5</span>
                </a>
            </li> -->

            <li>
                <a href="#">
                    <i class="fas fa-sign-out-alt menu-icon"></i>
                    <span class="menu-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>