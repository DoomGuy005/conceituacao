<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->softDeletes();
            });
        };

        if (Schema::hasTable('roles_users')) {
            Schema::table('roles_users', function (Blueprint $table) {
                $table->softDeletes();
            });
        };

        if (Schema::hasTable('roles')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->softDeletes();
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('deleted_at');
            });
        };

        if (Schema::hasTable('roles_users')) {
            Schema::table('roles_users', function (Blueprint $table) {
                $table->dropColumn('deleted_at');
            });
        };

        if (Schema::hasTable('roles')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->dropColumn('deleted_at');
            });
        };
    }
};
