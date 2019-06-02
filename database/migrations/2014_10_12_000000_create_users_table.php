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
        Schema::defaultStringLength(255);
     
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('citizenid');
            $table->string('lineid');
            $table->string('phonenumber');
            $table->string('password');
            $table->boolean('roleid')->default('0');
            
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('schoolname');
            $table->string('description');
            $table->string('phonenumber'); 
            $table->boolean('check')->default('0');
            $table->integer('difficult')->default('0');
            $table->boolean('success')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('money', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('money');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('forms');
    }
}
