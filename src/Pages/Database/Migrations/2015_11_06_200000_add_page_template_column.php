<?php

use Illuminate\Database\Migrations\Migration;

class AddPageTemplateColumn extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('flare_cms_pages', function ($table) {
            $table->string('template')->nullable()->after('author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('flare_cms_pages', function ($table) {
            $table->dropColumn('template');
        });
    }
}
