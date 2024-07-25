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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('profile')->nullable();
			$table->integer('role');
			$table->integer('gender');
			$table->bigInteger('contact');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('password');
			$table->boolean('status');
            $table->rememberToken();
			$table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
			$table->softDeletes();
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
