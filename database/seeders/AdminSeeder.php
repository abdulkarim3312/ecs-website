<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            'Dashboard' => [
                'view-dashboard',
            ],
            'Permissions' => [
                'delete-permissions',
                'edit-permissions',
                'create-permissions',
                'view-permissions',
            ],
            'Users' => [
                'users-management',
                'delete-users',
                'edit-users',
                'create-users',
                'view-users',
            ],
            'Roles' => [
                'roles-management',
                'delete-roles',
                'edit-roles',
                'create-roles',
                'view-roles',
            ],
            'Announcement' => [
                'announcement-management',
                'delete-announcement',
                'edit-announcement',
                'create-announcement',
                'view-announcement',
            ],
            'Notice' => [
                'notice-management',
                'delete-notice',
                'edit-notice',
                'create-notice',
                'view-notice',
            ],
            'Category' => [
                'category-management',
                'delete-category',
                'edit-category',
                'create-category',
                'view-category',
            ],
            'Widget' => [
                'widget-management',
                'delete-widget',
                'edit-widget',
                'create-widget',
                'view-widget',
            ],
            'Page' => [
                'page-management',
                'delete-page',
                'edit-page',
                'create-page',
                'view-page',
            ],
            'Menu' => [
                'menu-management',
                'delete-menu',
                'edit-menu',
                'create-menu',
                'view-menu',
            ],
            'Setting' => [
                'setting-management',
            ],
            'Gallery' => [
                'view-gallery',
                'delete-gallery',
                'edit-gallery',
                'create-gallery',
            ],
            'Banner' => [
                'view-banner',
                'delete-banner',
                'edit-banner',
                'create-banner',
            ],
            'Party' => [
                'view-party',
                'delete-party',
                'edit-party',
                'create-party',
            ],
            'Video' => [
                'view-video',
                'delete-video',
                'edit-video',
                'create-video',
            ],
            'Link' => [
                'view-link',
            ],
            'Archive' => [
                'view-archive',
                'delete-archive',
                'edit-archive',
                'create-archive',
            ],
            'Global' => [
                'view-global',
            ],
            'Directory' => [
                'view-directory',
                'delete-directory',
                'edit-directory',
                'create-directory',
            ],
        ];

        foreach ($modules as $module => $permissions) {
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(
                    ['name' => $permission, 'guard_name' => 'web'],
                    ['module' => $module]
                );
            }
        }

        // Admin role assign all permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->syncPermissions(Permission::all());

        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin1234'),
                'user_type' => 'Admin',
                'registered_at' => now(),
                'email_verified_at' => now(),
            ]
        );

        if (!$admin->hasRole($adminRole->name)) {
            $admin->assignRole($adminRole);
        }

        Role::firstOrCreate(['name' => 'User']);
    }
}
