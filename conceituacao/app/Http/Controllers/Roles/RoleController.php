<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Util\StatusResponse;
use App\Repositories\RoleRepository;
use Exception;

class RoleController extends Controller {

    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }
    
    public function index() {
        $perfis = $this->roleRepository->all();
        return $perfis;
    }

    public function store(CreateRoleRequest $request) {
        $arrDados = $request->validated();
        $novoPerfil = $this->roleRepository->create($arrDados);
        return $novoPerfil;
    }

    public function show(int $idRole) {
        $perfil = $this->roleRepository->find($idRole);
        return $perfil;
    }

    public function update(UpdateRoleRequest $updateRoleRequest, int $idRole) {
        $perfil = $this->roleRepository->find($idRole);
        if (empty($perfil))
            throw new Exception("Perfil não encontrado");
        $arrDados = $updateRoleRequest->validated();
        $this->roleRepository->update($perfil, $arrDados);
        return $perfil;
    }

    public function destroy(int $idRole) {
        $role = $this->roleRepository->find($idRole);
        if (empty($role))
            throw new Exception("Perfil não encontrado");
        $this->roleRepository->delete($role);
        return response(StatusResponse::sucess("Perfil apagado com sucesso"));
    }
}