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
                'type' => 'title',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ],
            // [
            //     'title' => 'Dashboard',
            //     'icon' => 'bi bi-grid-fill',
            //     'route' => 'dashboard.index',
            //     'type' => 'item',
            //     'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            // ],
            [
                'title' => 'Submit SPPD',
                'icon' => 'bi bi-file-earmark-medical-fill',
                'route' => 'dashboard.submit',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ],
            [
                'title' => 'Status SPPD',
                'icon' => 'bi bi-pencil-square',
                'route' => 'dashboard.status',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ],
            [
                'title' => 'Konfirmasi SPPD',
                'icon' => 'bi bi-pencil-square',
                'route' => 'dashboard.konfirmasiSppd',
                'type' => 'item',
                'roleMenu' => ['Sekretaris', 'Manager', 'Asisten Manager',]
            ],
            [
                'title' => 'Konfirmasi Akun',
                'icon' => 'bi bi-people-fill',
                'route' => 'dashboard.konfirmasiAkun',
                'type' => 'item',
                'roleMenu' => ['superadmin']
            ],
            [
                'title' => 'Riwayat SPPD',
                'icon' => 'bi bi-clock-history',
                'route' => 'dashboard.riwayatSppd',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ],
            [
                'title' => 'Akun',
                'type' => 'title',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ],
            // [
            //     'title' => 'Profile',
            //     'icon' => 'bi bi-person',
            //     'route' => 'dashboard.profile',
            //     'type' => 'item',
            //     'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            // ],
            [
                'title' => 'Logout',
                'icon' => 'bi bi-box-arrow-left',
                'route' => 'doLogout',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ]
        ];
    }

    public static function userHasAccess($menuItem)
    {
        $userRole = session('role');
        return in_array($userRole, $menuItem['roleMenu']);
    }
}
