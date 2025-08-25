<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller
{
    public function showLogin(): void
    {
        $error = isset($_GET['e']) ? htmlspecialchars((string)$_GET['e'], ENT_QUOTES, 'UTF-8') : '';
        $this->view('Auth/Login', ['error' => $error], 'layouts/admin');
    }

    public function authenticate(): void
    {
        // Rate limiting: 5 attempts per 10 minutes
        $attempt = $_SESSION['login_attempt'] ?? ['count' => 0, 'time' => time()];
        if ($attempt['count'] >= 5 && (time() - $attempt['time']) < 600) {
            $this->redirect('login?e=Too+many+attempts');
            return;
        } elseif ((time() - $attempt['time']) >= 600) {
            $attempt = ['count' => 0, 'time' => time()];
        }

        $token = $_POST[CSRF_TOKEN_NAME] ?? '';
        if (empty($token) || empty($_SESSION[CSRF_TOKEN_NAME]) || !hash_equals($_SESSION[CSRF_TOKEN_NAME], $token)) {
            $attempt['count']++;
            $_SESSION['login_attempt'] = $attempt;
            $this->redirect('login?e=Invalid+CSRF');
            return;
        }

        $identifier = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        if ($identifier === '' || $password === '') {
            $attempt['count']++;
            $_SESSION['login_attempt'] = $attempt;
            $this->redirect('login?e=Invalid+credentials');
            return;
        }

        $userModel = new User();
        if (str_contains($identifier, '@')) {
            $user = $userModel->findByEmail($identifier);
        } else {
            $user = $userModel->findByUsername($identifier);
        }

        if (!$user || !password_verify($password, $user['password'])) {
            $attempt['count']++;
            $_SESSION['login_attempt'] = $attempt;
            $this->redirect('login?e=Invalid+credentials');
            return;
        }

        session_regenerate_id(true);
        $_SESSION['login_attempt'] = ['count' => 0, 'time' => time()];
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'profile_pic' => $user['profile_pic'],
        ];

        if ($user['role'] === 'admin') {
            $this->redirect('admin');
        } else {
            $this->redirect('/');
        }
    }

    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], true);
        }
        session_destroy();
        $this->redirect('login');
    }
}
