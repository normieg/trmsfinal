<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert"><?= $error ?></div>
<?php endif; ?>
<form method="post" action="<?= url('auth/login'); ?>">
    <div class="mb-3">
        <label for="username" class="form-label">Username or Email</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>" value="<?= htmlspecialchars($_SESSION[CSRF_TOKEN_NAME] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    <button type="submit" class="btn btn-primary">Login</button>
</form>