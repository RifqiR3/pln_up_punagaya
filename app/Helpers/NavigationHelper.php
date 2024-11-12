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
                'title' => 'SPPD',
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
                'icon' => 'bi bi-file-earmark',
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
                'title' => 'Riwayat SPPD',
                'icon' => 'bi bi-clock-history',
                'route' => 'dashboard.riwayatSppd',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ],
            [
                'title' => 'Mobil Dinas',
                'type' => 'title',
                'roleMenu' => ['superadmin', 'Karyawan', 'Asisten Manager']
            ],
            [
                'title' => 'Submit Mobil Dinas',
                'icon' => 'bi bi-car-front-fill',
                'route' => 'dashboard.submitMobilDinas',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Karyawan']
            ],
            [
                'title' => 'Status Mobil Dinas',
                'icon' => 'bi bi-file-earmark',
                'route' => 'dashboard.statusMobilDinas',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Karyawan']
            ],
            [
                'title' => 'Konfirmasi Mobil Dinas',
                'icon' => 'bi bi-check-circle',
                'route' => 'dashboard.konfirmasiMobilDinas',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Asisten Manager']
            ],
            [
                'title' => 'Manage Driver',
                'icon' => 'bi bi-person-badge',
                'route' => 'dashboard.manageDriver',
                'type' => 'item',
                'roleMenu' => ['superadmin', 'Asisten Manager']
            ],
            [
                'title' => 'Akun',
                'type' => 'title',
                'roleMenu' => ['superadmin', 'Sekretaris', 'Manager', 'Asisten Manager', 'Karyawan']
            ],
            [
                'title' => 'Konfirmasi Akun',
                'icon' => 'bi bi-people-fill',
                'route' => 'dashboard.konfirmasiAkun',
                'type' => 'item',
                'roleMenu' => ['superadmin']
            ],
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
