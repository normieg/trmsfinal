<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
if (str_starts_with($currentPath, BASE_PATH)) {
    $currentPath = substr($currentPath, strlen(BASE_PATH) - 1);
}
$currentPath = '/' . ltrim($currentPath, '/');
?>
<div class="offcanvas-body d-flex flex-column p-0">
    <div class="p-3 border-bottom">
        <strong>TRMS</strong>
    </div>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a class="nav-link <?= $currentPath === '/admin' ? 'active' : 'text-dark'; ?>" href="<?= url('admin'); ?>">Dashboard</a>
        </li>
        <li>
            <a class="nav-link text-dark" href="#">Trucks</a>
        </li>
        <li>
            <button class="btn btn-toggle align-items-center rounded w-100 text-start <?= str_starts_with($currentPath, '/admin/users') ? '' : 'collapsed'; ?>" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="<?= str_starts_with($currentPath, '/admin/users') ? 'true' : 'false'; ?>" aria-controls="users-collapse">Users</button>
            <div class="collapse <?= str_starts_with($currentPath, '/admin/users') ? 'show' : ''; ?>" id="users-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a class="nav-link text-dark ps-4" href="#">Mechanic</a></li>
                    <li><a class="nav-link <?= $currentPath === '/admin/users' ? 'active' : 'text-dark'; ?> ps-4" href="<?= url('admin/users'); ?>">Staff</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
