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
        $permissions = [
            'view dashboard',
            'delete-permissions',
            'edit-permissions',
            'create-permissions',
            'view-permissions',
            'users-management',
            'delete-users',
            'edit-users',
            'create-users',
            'view-users',
            'roles-management',
            'delete-roles',
            'edit-roles',
            'create-roles',
            'view-roles',
            'announcement-management',
            'delete-announcement',
            'edit-announcement',
            'create-announcement',
            'view-announcement',
            'notice-management',
            'delete-notice',
            'edit-notice',
            'create-notice',
            'view-notice',
            'category-management',
            'delete-category',
            'edit-category',
            'create-category',
            'view-category',
            'widget-management',
            'delete-widget',
            'edit-widget',
            'create-widget',
            'view-widget',
            'page-management',
            'delete-page',
            'edit-page',
            'create-page',
            'view-page',
            'menu-management',
            'delete-menu',
            'edit-menu',
            'create-menu',
            'view-menu',
            'setting-management',
            'view-gallery',
            'view-banner',
            'view-party',
            'view-video',
            'view-link',
            'view-archive',
            'view-global',
            'view-directory',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

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
