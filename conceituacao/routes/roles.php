<?php

use App\Http\Controllers\Roles\RoleController;
use App\Http\Middleware\SomenteAdmins;

Route::middleware(["auth"])->group(function () {
    Route::get("roles", [RoleController::class, 'index'])
        ->name("roles.list");
        
    Route::get("roles/{idRole}", [RoleController::class, "show"])
        ->name("roles.show");

    Route::put("roles/{idRole}", [RoleController::class, "update"])
        ->name("roles.update")
        ->middleware(SomenteAdmins::class);

    Route::delete("roles/{idRole}", [RoleController::class, "destroy"])
        ->name("roles.destroy")
        ->middleware(SomenteAdmins::class);
});