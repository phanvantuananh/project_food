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
            $table->id();
            $table->string('name', 50);
            $table->string('email', 70)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('age')->unsigned()->nullable();
            $table->string('address', 70)->nullable();
            $table->string('phone', 30)->unique()->nullable();
            $table->tinyInteger('role')->nullable();
            $table->string('image')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
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
