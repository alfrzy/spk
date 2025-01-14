<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRoleDefaultInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(1)->change(); // Set default role ke 1
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(null)->change(); // Kembalikan default role
        });
    }
}

