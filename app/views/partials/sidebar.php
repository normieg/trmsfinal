<?php ?>
<nav class="app-sidebar sidebar-nav p-3">
    <a href="<?= url('admin/dashboard'); ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-4">FilStar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= url('admin/dashboard'); ?>" class="nav-link">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-truck me-2"></i>Trucks
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-bag-check me-2"></i>Purchase Requests
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-wrench-adjustable-circle me-2"></i>Work Orders
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-graph-up me-2"></i>Reports
            </a>
        </li>
        <li>
            <a href="#" class="nav-link">
                <i class="bi bi-gear me-2"></i>Settings
            </a>
        </li>
        <li class="mt-3">
            <button class="btn btn-toggle align-items-center rounded collapsed w-100 text-start" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="true">
                <i class="bi bi-people me-2"></i>Users
                <span class="chev float-end"></span>
            </button>
            <div class="collapse show" id="users-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-4 align-items-center">
                    <li><a href="#" class="nav-link">Mechanics</a></li>
                    <li><a href="#" class="nav-link active">Staff</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>