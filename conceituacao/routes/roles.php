<?php

use App\Http\Controllers\Roles\RoleController;
use App\Http\Middleware\SomenteAdmins;

Route::middleware(["auth"])->group(function () {

    Route::get("roles", [RoleController::class, 'index'])
        ->name("roles.list");
        
    Route::get("roles/{idRole}", [RoleController::class, "show"])
        ->where('idRole', "[0-9]+")
        ->name("roles.show");

    Route::get("roles/create", [RoleController::class, "create"])
        ->name("roles.create")
        ->middleware(SomenteAdmins::class);

    Route::post("roles", [RoleController::class, "store"])
        ->name("roles.store")
        ->middleware(SomenteAdmins::class);

    Route::put("roles/{idRole}", [RoleController::class, "update"])
        ->name("roles.update")
        ->where('idRole', "[0-9]+")
        ->middleware(SomenteAdmins::class);

    Route::delete("roles/{idRole}", [RoleController::class, "destroy"])
        ->name("roles.destroy")
        ->where('idRole', "[0-9]+")
        ->middleware(SomenteAdmins::class);
});