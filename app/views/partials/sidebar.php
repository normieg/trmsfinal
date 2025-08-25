<!-- C:\xampp\htdocs\trmsfinal\app\views\partials\sidebar.php -->

<nav id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; min-height: 100vh; background-color: #001f3f;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">My Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link text-white active" aria-current="page">
                Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                Profile
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                Reports
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                Settings
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                Logout
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
            <strong>User</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</nav>

<!-- Sidebar toggle button for mobile -->
<button class="btn btn-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
    ☰ Menu
</button>

<!-- Offcanvas Sidebar for Mobile -->
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a href="#" class="nav-link text-white">Dashboard</a></li>
            <li><a href="#" class="nav-link text-white">Profile</a></li>
            <li><a href="#" class="nav-link text-white">Reports</a></li>
            <li><a href="#" class="nav-link text-white">Settings</a></li>
            <li><a href="#" class="nav-link text-white">Logout</a></li>
        </ul>
    </div>
</div>