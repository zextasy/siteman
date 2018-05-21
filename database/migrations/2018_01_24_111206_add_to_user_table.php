<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            // $table->integer('phone_number')->nullable();
            // $table->string('gender')->nullable();
            // $table->string('country')->nullable();
            // $table->string('department')->nullable();
            // $table->string('profile_image')->nullable();
            // $table->string('role')->nullable();
            // $table->string('permissions')->nullable();
            // $table->SoftDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['phone_number', 'gender', 'country', 'department', 'profile_image', 'role', 'permissions
            ']);
        });
    }
}
