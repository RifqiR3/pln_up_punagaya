<?php
// Create a navigation helper class in app/Helpers/NavigationHelper.php

namespace App\Helpers;

use function PHPSTORM_META\type;

class NavigationHelper
{
    public static function isActive($routeName)
    {
        return request()->routeIs($routeName) ? 'active' : '';
    }

    public static function getMenuItems()
    {
        return [
            [
                'title' => 'Menu',
                'type' => 'title'
            ],
            [
                'title' => 'Dashboard',
                'icon' => 'bi bi-grid-fill',
                'route' => 'dashboard.index',
                'type' => 'item'
            ],
            [
                'title' => 'Submit SPPD',
                'icon' => 'bi bi-file-earmark-medical-fill',
                'route' => 'dashboard.submit',
                'type' => 'item'
            ],
            [
                'title' => 'Status SPPD',
                'icon' => 'bi bi-pencil-square',
                'route' => 'dashboard.status',
                'type' => 'item'
            ],
            [
                'title' => 'Konfirmasi Akun',
                'icon' => 'bi bi-people-fill',
                'route' => 'dashboard.konfirmasiAkun',
                'type' => 'item'
            ],
            [
                'title' => 'Akun',
                'type' => 'title'
            ],
            [
                'title' => 'Profile',
                'icon' => 'bi bi-person',
                'route' => 'dashboard.profile',
                'type' => 'item'
            ],
            [
                'title' => 'Logout',
                'icon' => 'bi bi-box-arrow-left',
                'route' => 'doLogout',
                'type' => 'item'
            ]
        ];
    }
}
