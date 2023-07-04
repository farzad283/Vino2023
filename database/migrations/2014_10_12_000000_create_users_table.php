<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->notNullable();
            $table->string('first_name',50)->notNullable();
            $table->string('last_name',50)->notNullable();
            $table->string('email',100)->unique()->notNullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100)->notNullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
