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
        return Inertia::render('roles/Index', [
            'roles' => $perfis
        ]);
    }

    public function store(CreateRoleRequest $request) {
        $arrDados = $request->validated();
        $novoPerfil = $this->roleRepository->create($arrDados);
        return $this->index();
    }

    public function show($idRole) {
        $perfil = $this->roleRepository->find((int) $idRole);
        return Inertia::render('roles/EditRole', [
            'role' => $perfil
        ]);
    }

    public function update(UpdateRoleRequest $updateRoleRequest, $idRole) {
        $perfil = $this->roleRepository->find((int) $idRole);
        if (empty($perfil))
            throw new Exception("Perfil não encontrado");
        $arrDados = $updateRoleRequest->validated();
        $this->roleRepository->update($perfil, $arrDados);

        $listaPerfis = $this->roleRepository->all();
        return Inertia::render('roles/Index', [
            'roles' => $listaPerfis
        ])->with(StatusResponse::sucess("Perfil Editado com sucesso"));
    }

    public function destroy($idRole) {
        $role = $this->roleRepository->find((int) $idRole);
        if (empty($role))
            throw new Exception("Perfil não encontrado");
        $this->roleRepository->delete($role);
        return response(StatusResponse::sucess("Perfil apagado com sucesso"));
    }
}