<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg border-0 rounded-3 p-4" style="max-width: 400px; width: 100%;">

        <div class="text-center mb-4">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <img src="/trmsfinal/public/assets/images/filstarlogo.png"
                    alt="Logo" style="max-width: 50px; margin-right: 10px;">
                <span class="h5 mb-0 fw-bold">Filstar Corp.</span>
            </div>
            <hr>
            <h4 class="fw-medium">Login</h4>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert"><?= $error ?></div>
        <?php endif; ?>

        <form method="post" action="<?= url('auth/login'); ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control border-primary" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control border-primary" id="password" name="password" required>
            </div>
            <input type="hidden" name="<?= CSRF_TOKEN_NAME ?>"
                value="<?= htmlspecialchars($_SESSION[CSRF_TOKEN_NAME] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
        </form>
    </div>
</div>