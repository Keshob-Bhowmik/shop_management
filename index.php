
<?php
include "common/navbar.php";
?>
    <!-- Main Content -->
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

        <!-- Dashboard Content -->
        <div class="content">
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="stats-number">1,234</h3>
                        <p class="stats-title">Total Users</p>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> 12% increase</small>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="stats-number">567</h3>
                        <p class="stats-title">Total Orders</p>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> 8% increase</small>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h3 class="stats-number">$12,456</h3>
                        <p class="stats-title">Revenue</p>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> 23% increase</small>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="stats-number">98%</h3>
                        <p class="stats-title"> Satisfaction</p>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> 5% increase</small>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="quick-actions">
                        <div class="quick-action-btn">
                            <i class="fas fa-plus-circle"></i>
                            <span>New User</span>
                        </div>
                        <div class="quick-action-btn">
                            <i class="fas fa-chart-bar"></i>
                            <span>Generate Report</span>
                        </div>
                        <div class="quick-action-btn">
                            <i class="fas fa-upload"></i>
                            <span>Upload File</span>
                        </div>
                        <div class="quick-action-btn">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="chart-card">
                        <h5>Revenue Overview</h5>
                        <div class="text-center mt-4">
                            <i class="fas fa-chart-line fa-4x text-primary"></i>
                            <p class="mt-3 text-muted">Chart would display here</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="chart-card">
                        <h5>User Activity</h5>
                        <div class="text-center mt-4">
                            <i class="fas fa-chart-pie fa-4x text-success"></i>
                            <p class="mt-3 text-muted">Chart would display here</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="row">
                <div class="col-12">
                    <div class="table-card">
                        <div class="card-header">
                            <h5>Recent Orders</h5>
                            <button class="btn btn-sm btn-primary">View All</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD-001</td>
                                        <td>John Smith</td>
                                        <td>Product A</td>
                                        <td>$299.00</td>
                                        <td><span class="badge-status badge-success">Completed</span></td>
                                        <td>2024-01-15</td>
                                        <td>
                                            <button class="action-btn"><i class="fas fa-eye"></i></button>
                                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-002</td>
                                        <td>Sarah Johnson</td>
                                        <td>Product B</td>
                                        <td>$149.00</td>
                                        <td><span class="badge-status badge-warning">Pending</span></td>
                                        <td>2024-01-14</td>
                                        <td>
                                            <button class="action-btn"><i class="fas fa-eye"></i></button>
                                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-003</td>
                                        <td>Mike Wilson</td>
                                        <td>Product C</td>
                                        <td>$499.00</td>
                                        <td><span class="badge-status badge-danger">Cancelled</span></td>
                                        <td>2024-01-13</td>
                                        <td>
                                            <button class="action-btn"><i class="fas fa-eye"></i></button>
                                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-004</td>
                                        <td>Emily Brown</td>
                                        <td>Product D</td>
                                        <td>$89.00</td>
                                        <td><span class="badge-status badge-success">Completed</span></td>
                                        <td>2024-01-12</td>
                                        <td>
                                            <button class="action-btn"><i class="fas fa-eye"></i></button>
                                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-005</td>
                                        <td>David Lee</td>
                                        <td>Product E</td>
                                        <td>$199.00</td>
                                        <td><span class="badge-status badge-warning">Processing</span></td>
                                        <td>2024-01-11</td>
                                        <td>
                                            <button class="action-btn"><i class="fas fa-eye"></i></button>
                                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="row">
                <div class="col-md-6">
                    <div class="table-card">
                        <div class="card-header">
                            <h5>Recent Users</h5>
                            <button class="btn btn-sm btn-primary">View All</button>
                        </div>

                        <div class="user-list">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        AS
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Alice Smith</h6>
                                        <small class="text-muted">Joined 2 days ago</small>
                                    </div>
                                </div>
                                <span class="badge-status badge-success">Active</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                        RJ
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Robert Johnson</h6>
                                        <small class="text-muted">Joined 5 days ago</small>
                                    </div>
                                </div>
                                <span class="badge-status badge-success">Active</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                        MW
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Maria Williams</h6>
                                        <small class="text-muted">Joined 1 week ago</small>
                                    </div>
                                </div>
                                <span class="badge-status badge-warning">Pending</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                        JB
                                    </div>
                                    <div>
                                        <h6 class="mb-0">James Brown</h6>
                                        <small class="text-muted">Joined 1 week ago</small>
                                    </div>
                                </div>
                                <span class="badge-status badge-success">Active</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="table-card">
                        <div class="card-header">
                            <h5>Recent Activity</h5>
                            <button class="btn btn-sm btn-primary">View All</button>
                        </div>

                        <div class="activity-list">
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-circle text-success me-3 mt-1" style="font-size: 0.5rem;"></i>
                                <div>
                                    <p class="mb-0"><strong>John Doe</strong> created a new order</p>
                                    <small class="text-muted">5 minutes ago</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-circle text-primary me-3 mt-1" style="font-size: 0.5rem;"></i>
                                <div>
                                    <p class="mb-0"><strong>Sarah Smith</strong> updated her profile</p>
                                    <small class="text-muted">15 minutes ago</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-circle text-warning me-3 mt-1" style="font-size: 0.5rem;"></i>
                                <div>
                                    <p class="mb-0"><strong>Mike Wilson</strong> uploaded a new file</p>
                                    <small class="text-muted">30 minutes ago</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-start">
                                <i class="fas fa-circle text-info me-3 mt-1" style="font-size: 0.5rem;"></i>
                                <div>
                                    <p class="mb-0"><strong>Emily Brown</strong> completed a task</p>
                                    <small class="text-muted">1 hour ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "common/footer.php";
?>