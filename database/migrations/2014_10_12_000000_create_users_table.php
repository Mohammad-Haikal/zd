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
            $table->integer('role')->default(0); // 0: student,  1: instructor,  2: admin
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('country')->nullable();
            $table->boolean('view_st')->default(0);
            $table->boolean('view_in')->default(0);
            $table->boolean('view_ad')->default(0);
            $table->boolean('view_ta')->default(0);
            $table->boolean('add_st')->default(0);
            $table->boolean('add_in')->default(0);
            $table->boolean('add_ad')->default(0);
            $table->boolean('add_co')->default(0);
            $table->boolean('add_ta')->default(0);
            $table->boolean('edit_st')->default(0);
            $table->boolean('edit_in')->default(0);
            $table->boolean('edit_ad')->default(0);
            $table->boolean('edit_co')->default(0);
            $table->boolean('edit_ta')->default(0);
            $table->boolean('delete_st')->default(0);
            $table->boolean('delete_in')->default(0);
            $table->boolean('delete_ad')->default(0);
            $table->boolean('delete_co')->default(0);
            $table->boolean('delete_ta')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
