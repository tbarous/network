<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->string('avatar')->nullable();

            $table->string('provider_token')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();

            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('hireable')->nullable();
            $table->string('blog')->nullable();
            $table->string('company')->nullable();

            $table->string('country')->nullable();

            $table->string('programming_language')->nullable();

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
