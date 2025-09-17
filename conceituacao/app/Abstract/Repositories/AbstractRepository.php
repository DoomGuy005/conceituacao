<?php

namespace App\Abstract\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository {

    protected $model;
    protected $modelClass;

    public function __construct(Model $model) {
        $this->model = $model;
        $this->modelClass = get_class($this->model);
    }

    public function all() {
        return $this->model->all();
    }

    public function find(int $idModel) {
        return $this->model->find($idModel);
    }

    public function findOrFail(int $idModel) {
        return $this->model->findOrFail($idModel);
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data) {
        if (!$model instanceof $this->modelClass)
            throw new Exception("Model inválido para este repository");
        
        return $model->update($data);
    }

    public function delete(Model $model) {
        if (!$model instanceof $this->modelClass)
            throw new Exception("Model inválido para este repository");
        
        return $model->delete();
    }
}