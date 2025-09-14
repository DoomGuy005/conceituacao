<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model {

    use SoftDeletes;

    protected $fillable = ["role_id", "user_id"];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
}