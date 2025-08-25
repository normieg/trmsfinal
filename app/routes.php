<?php
return [
    'GET' => [
        '/'            => ['HomeController', 'index'],
        '/login'       => ['AuthController', 'showLogin'],
        '/logout'      => ['AuthController', 'logout'],
        '/admin'       => ['AdminController', 'dashboard'],
        '/admin/users' => ['AdminController', 'usersIndex'],
    ],
    'POST' => [
        '/auth/login'  => ['AuthController', 'authenticate'],
    ],
];
