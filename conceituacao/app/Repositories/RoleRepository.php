<?php

namespace App\Repositories;

use App\Abstract\Repositories\AbstractRepository;
use App\Models\Role;

/**
 * @method \Illuminate\Database\Eloquent\Collection<Role> all()
 * @method Role|null find(int $idRole)
 * @method Role findOrFail(int $idRole)
 * @method Role create(array $data)
 * @method bool update(Role $role, array $data)
 * @method bool delete(Role $role)
 */
class RoleRepository extends AbstractRepository {

    public function __construct(Role $role) {
        parent::__construct($role);
    }
}