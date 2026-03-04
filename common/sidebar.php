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

            <li>
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
            </li>

            <li>
                <a href="#" onclick="toggleSubmenu('users-submenu')">
                    <i class="fas fa-users menu-icon"></i>
                    <span class="menu-text">Users</span>
                    <i class="fas fa-chevron-right arrow-icon" id="users-arrow"></i>
                </a>
                <ul class="submenu" id="users-submenu">
                    <li><a href="#">All Users</a></li>
                    <li><a href="#">Add New</a></li>
                    <li><a href="#">Roles</a></li>
                    <li><a href="#">Permissions</a></li>
                </ul>
            </li>

            <li>
                <a href="#" onclick="toggleSubmenu('content-submenu')">
                    <i class="fas fa-file-alt menu-icon"></i>
                    <span class="menu-text">Content</span>
                    <i class="fas fa-chevron-right arrow-icon" id="content-arrow"></i>
                </a>
                <ul class="submenu" id="content-submenu">
                    <li><a href="#">Posts</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Categories</a></li>
                </ul>
            </li>

            <li>
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
            </li>

            <li>
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
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-calendar menu-icon"></i>
                    <span class="menu-text">Calendar</span>
                </a>
            </li>

            <li>
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
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-sign-out-alt menu-icon"></i>
                    <span class="menu-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>