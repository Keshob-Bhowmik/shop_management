<?php
include "common/navbar.php";
?>

<div class="main-content" id="mainContent">
    <!-- Top Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <button class="toggle-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="page-title">Dashboard</h5>
        </div>

        <div class="navbar-right">
            <div class="notification-icon">
                <i class="far fa-bell"></i>
                <span class="badge">3</span>
            </div>

            <div class="notification-icon">
                <i class="far fa-envelope"></i>
                <span class="badge">5</span>
            </div>

            <div class="user-dropdown">
                <div class="user-avatar">
                    JD
                </div>
                <div class="user-info">
                    <p class="user-name">John Doe</p>
                    <p class="user-role">Administrator</p>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="table-card">
                <div class="card-header">
                    <h5>Sales</h5>
                    <a href="sales.php" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createModal">Add Sale</a>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Sales ID</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1</td>
                                <td>S001</td>
                                <td>2024-01-15 10:30:00</td>
                                <td>$1,250.50</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#2</td>
                                <td>S002</td>
                                <td>2024-01-15 14:20:00</td>
                                <td>$89.99</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#3</td>
                                <td>S003</td>
                                <td>2024-01-16 09:15:00</td>
                                <td>$350.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#4</td>
                                <td>S004</td>
                                <td>2024-01-16 16:45:00</td>
                                <td>$2,100.75</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>