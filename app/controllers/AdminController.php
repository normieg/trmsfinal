<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class AdminController extends Controller
{
    public function __construct()
    {
        if (empty($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
            $this->redirect('login?e=Unauthorized');
        }
    }

    public function dashboard(): void
    {
        $userModel = new User();
        $count = $userModel->countAll();
        $this->view('Admin/Dashboard', ['userCount' => $count]);
    }

    public function usersIndex(): void
    {
        $userModel = new User();
        $users = $userModel->all();
        $this->view('Admin/UsersIndex', ['users' => $users]);
    }
}
