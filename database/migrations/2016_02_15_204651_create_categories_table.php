<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing categories
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->foreign('parent_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
            $table->integer('order')->default(1);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('inner_title')->nullable();
            $table->string('price_from')->nullable();
            $table->text('inner_description')->nullable();
            $table->string('inner_description_image')->nullable();
            $table->string('bottom_description_title')->nullable();
            $table->longText('bottom_description')->nullable();
            $table->string('process_title')->nullable();
            $table->longText('process_description')->nullable();
            $table->string('show_comments')->nullable();
            $table->string('show_contact_form')->nullable();
            $table->string('show_our_works')->nullable();
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
        Schema::drop('categories');
    }
}
