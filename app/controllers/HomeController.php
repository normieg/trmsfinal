<?php
require_once __DIR__ . '/../core/Controller.php';

class HomeController extends Controller
{
    public function index(): void
    {
        if (!empty($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin') {
            $this->redirect('admin');
            return;
        }
        $this->view('home');
    }
}
