<?php ?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= url('assets/css/style.css'); ?>" rel="stylesheet">
</head>
<body class="d-flex">
    <div class="offcanvas-lg offcanvas-start bg-light" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <?php include __DIR__ . '/../partials/sidebar.php'; ?>
    </div>
    <div class="flex-grow-1 p-3">
        <button class="btn btn-outline-secondary d-lg-none mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <span class="bi bi-list"></span>
        </button>
        <?= $content ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= url('assets/js/app.js'); ?>"></script>
</body>
</html>
