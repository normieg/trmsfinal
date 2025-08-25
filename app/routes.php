<?php
return [
    'GET' => [
        '/'            => ['AuthController', 'showLogin'],
        '/login'       => ['AuthController', 'showLogin'],
        '/logout'      => ['AuthController', 'logout'],
        '/admin'       => ['AdminController', 'dashboard'],
        '/admin/users' => ['AdminController', 'usersIndex'],
        '/admin/users/mechanics' => ['AdminController', 'mechanicsIndex'],

    ],
    'POST' => [
        '/auth/login'  => ['AuthController', 'authenticate'],
    ],
];
