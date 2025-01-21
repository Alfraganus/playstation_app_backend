<?php

namespace App\Services;

use App\Models\SubscriptionHistory;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthService
{
    const ADMIN_ROLE ='admin';
    const WORKER_ROLE ='worker';
    public array $roles = [
        self::ADMIN_ROLE,
        self::WORKER_ROLE,
    ];

    public static function createPermission($permission): void
    {
        Permission::create(['name' => $permission]);
    }

    public  function createUserWithRole( $userData, string $role)
    {
        $user = User::create([
            'name' => $userData['name'],
            'username' => $userData['username'],
            'is_admin' => $userData['is_admin'],
            'admin_id' =>isset( $userData['admin_id']) ? intval($userData['admin_id']) : null,
            'email' => sprintf('%s@.gmail.com', $userData['username'] . time()),
            'password' => Hash::make($userData['password']),
        ]);

        $this->assignRole($role, $user);
        if($role == self::ADMIN_ROLE) {
            $this->createSubscriptionHistory($user);
        }
        return $user;
    }

    public function assignRole(string $role, User $user)
    {
        if (!in_array($role, $this->roles)) {
            throw ValidationException::withMessages([
                'role' => ['The specified role is invalid.'],
            ]);
        }
        $roleModel = Role::query()->firstOrCreate(['name' => $role]);
        $user->assignRole($roleModel->name);
    }

    public function createSubscriptionHistory(User $user)
    {
        if ($user->current_subscription_end) {
            $startingSubscription = Carbon::parse($user->current_subscription_end);
            $endingSubscription = $startingSubscription->copy()->addDays(30);
        } else {
            $startingSubscription = Carbon::now();
            $endingSubscription = $startingSubscription->copy()->addDays(30);
        }

        SubscriptionHistory::create([
            'admin_user_id' => $user->id,
            'starting_subscription' => $startingSubscription,
            'ending_subscription' => $endingSubscription,
            'tariff_id' => null,
        ]);

        $user->update([
            'current_subscription_end' => $endingSubscription,
        ]);
    }
}
