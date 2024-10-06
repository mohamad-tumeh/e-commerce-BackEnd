<?php

namespace App\Http\Middleware\Permissions;

use App\Domain\Permissions\Model\PermissionsPrimerUser;
use App\Helpers\Response;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetMerchants
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
            $primer_user_id = Auth::guard('primer_user')->id();
            $check = PermissionsPrimerUser::where('primer_user_id', $primer_user_id)->where('permission_id',5)->first();
            if ($check == null) {
                return response()->json(Response::error("You can't access"),400);
            }

        return $next($request);
    }
}
