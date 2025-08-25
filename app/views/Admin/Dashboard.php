<h1>Admin Dashboard</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card text-bg-light mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text display-6"><?= htmlspecialchars((string)$userCount, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="alert alert-secondary" role="alert">
            List of staff, filters, and actions will go here.
        </div>
        <a class="btn btn-primary" href="<?= url('admin/users'); ?>">View Users</a>
    </div>
</div>
