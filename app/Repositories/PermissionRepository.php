<?php

namespace App\Repositories;

class PermissionRepository
{
    private $default_permissions = [
        'manage_own'  => 'Manage Own',
        // User
        'create_user' => 'Create User',
        'edit_user'   => 'Edit User',
        'delete_user' => 'Delete User',
        'view_user'   => 'View User',
        // Role
        'create_role' => 'Create Role',
        'edit_role'   => 'Edit Role',
        'delete_role' => 'Delete Role',
        'view_role'   => 'View Role',
    ];

    public function all()
    {
        return $this->default_permissions;
    }
}
