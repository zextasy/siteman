<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFormIdToTemplateValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_structures', function (Blueprint $table) {
            $table->integer('form_id')->nullable();
            $table->integer('required')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_structures', function (Blueprint $table) {
            $table->dropColumn(['form_id', 'required']);
        });
    }
}
