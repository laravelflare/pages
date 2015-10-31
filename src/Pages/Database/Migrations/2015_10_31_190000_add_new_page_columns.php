<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewPageColumns extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cms_pages', function ($table) {
            $table->integer('author_id')->unsigned()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cms_pages', function ($table) {
            $table->dropColumn('author_id');
        });
    }
}
