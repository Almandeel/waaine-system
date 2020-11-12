<?php

return [


    'role_structure' => [

        'superadmin' => [
            'users'                 => 'c,r,u,d',
            'orders'                => 'c,r,u,d,p',
            'dealers'               => 'c,r,u,d',
            'halls'                 => 'c,r,u,d',
            'dashboard'             => 'r',
        ],

        'customers' => [
            'orders'                => 'c,r,u,d',
            'halls'                 => 'r',
        ],

    ],
    'permission_structure' => [
        'super' => [
            'users'                 => 'c,r,u,d',
            'orders'                => 'c,r,u,d,p',
            'dealers'               => 'c,r,u,d',
            'halls'                 => 'c,r,u,d',
            'dashboard'             => 'r',
        ],
    ],


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'p' => 'print',
    ]
];
