<?php

namespace App\Services;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthService
{
    public static function createRole($role) : void
    {
         Role::create(['name' => $role]);
    }

    public static function createPermission($permission) : void
    {
        Permission::create(['name' => $permission]);
    }

    public static function createUserWithRole(array $userData, string $role): User
    {
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
        ]);

        $user->assignRole($role);

        return $user;
    }

}
