<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DefaultUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if ($this->isSessionRoleNotExistOrNotValidated()) {
                $user = auth()->user();
                if (empty($user->default_role) || !in_array($user->default_role, Role::DEFAULT_ROLES)) {
                    $role = $this->updateDefaultRole($user);
                    Session::put('role', $role);
                } else {
                    Session::put('role', $user->default_role);
                }
            }
        }
        return $next($request);
    }

    private function isSessionRoleNotExistOrNotValidated(): bool
    {
        return empty(Session::get('role')) || !in_array(Session::get('role'), Role::DEFAULT_ROLES);
    }

    private function updateDefaultRole($user)
    {
        $roleNames = $user->getRoleNames()->toArray();
        $roles = array_uintersect($roleNames, Role::DEFAULT_ROLES, 'strcasecmp');
        $role = array_shift($roles);
        unset($roles);

        if (empty($role) || !$role) {
            $role = Role::DEFAULT_ROLE;
            $user->assignRole($role);
        }

        $user->default_role = $role;
        $user->save();
        return $role;
    }
}
