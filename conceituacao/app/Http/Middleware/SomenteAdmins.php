<?php

namespace App\Http\Middleware;

use App;
use App\Http\Util\StatusResponse;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class SomenteAdmins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rolesRepository = app(RoleRepository::class);
        
        // Id do Perfil Admin
        $adminRole = $rolesRepository->find(2);
        $userRoles = auth()
            ->user()
            ->roles
            ->where("id", $adminRole->id);

        if (!count($userRoles)) {
            return redirect()
                ->route('roles.list')
                ->with(StatusResponse::error("Operação não permitida"));
        }

        return $next($request);
    }
}
