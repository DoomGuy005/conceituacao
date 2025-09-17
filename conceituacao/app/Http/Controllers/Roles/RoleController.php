<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Util\StatusResponse;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Database\Schema\IndexDefinition;
use Inertia\Inertia;

class RoleController extends Controller {

    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }
    
    public function index() {
        $perfis = $this->roleRepository->all();
        return Inertia::render('roles/index', [
            'roles' => $perfis
        ]);
    }

    public function create() {
        return Inertia::render('roles/create');
    }

    public function store(CreateRoleRequest $request) {
        $arrDados = $request->validated();
        $novoPerfil = $this->roleRepository->create($arrDados);
        return to_route('roles.list')
            ->with(StatusResponse::sucess("Perfil cadastrado com sucesso"));
    }

    public function show($idRole) {
        $perfil = $this->roleRepository->find((int) $idRole);
        return Inertia::render('roles/edit', [
            'role' => $perfil
        ]);
    }

    public function update(UpdateRoleRequest $updateRoleRequest, $idRole) {
        $perfil = $this->roleRepository->find((int) $idRole);
        if (empty($perfil))
            throw new Exception("Perfil não encontrado");
        $arrDados = $updateRoleRequest->validated();
        $this->roleRepository->update($perfil, $arrDados);

        return to_route('roles.list')
            ->with(StatusResponse::sucess("Perfil Editado com sucesso"));
    }

    public function destroy($idRole) {
        $role = $this->roleRepository->find((int) $idRole);
        if (empty($role))
            throw new Exception("Perfil não encontrado");
        $this->roleRepository->delete($role);

        return to_route('roles.list')
            ->with(StatusResponse::sucess("Perfil Apagado com sucesso"));
    }
}