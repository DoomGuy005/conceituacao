<?php

use App\Http\Controllers\Roles\RoleController;

Route::middleware(["auth"])->group(function () {
    Route::get("roles", [RoleController::class, 'index'])
        ->name("roles.list");
    Route::get("roles/{idRole}", [RoleController::class, "show"])
        ->name("roles.show");
    Route::put("roles/{idRole}", [RoleController::class, "update"])
        ->name("roles.update");
});