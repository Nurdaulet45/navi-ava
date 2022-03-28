<?php

namespace App\Http\Middleware;

use App\Models\UserRoleInformation;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastSeenUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expireTime = Carbon::now()->addMinute(1);
            $userInformation = UserRoleInformation::query()
                ->where(['user_id' => Auth::user()->id, 'role_name' => Auth::user()->default_role])->first();

            Cache::put('is_online' . $userInformation->id, true, $expireTime);

            $userInformation->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }
}
