<?php
class Controller
{
    protected function view(string $name, array $data = [], string $layout = 'layouts/admin'): void
    {
        $viewPath = __DIR__ . '/../views/' . $name . '.php';
        if (!is_file($viewPath)) {
            throw new RuntimeException('View not found');
        }
        extract($data, EXTR_SKIP);
        ob_start();
        include $viewPath;
        $content = ob_get_clean();
        $layoutPath = __DIR__ . '/../views/' . $layout . '.php';
        if (!is_file($layoutPath)) {
            throw new RuntimeException('Layout not found');
        }
        include $layoutPath;
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . url($path));
        exit;
    }
}
