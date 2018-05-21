<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubHeaderIdToTemplateValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('template_values', function (Blueprint $table) {
            //
            // $table->integer('sub_header_id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_values', function (Blueprint $table) {
            //
            $table->dropColumn('sub_header_id');
        });
    }
}
