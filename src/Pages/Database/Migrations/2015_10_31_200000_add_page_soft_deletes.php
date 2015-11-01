<?php

use Illuminate\Database\Migrations\Migration;

class AddPageSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cms_pages', function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cms_pages', function ($table) {
            $table->dropColumn('deleted_at');
        });
    }
}
