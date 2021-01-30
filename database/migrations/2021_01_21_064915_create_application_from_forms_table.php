<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFromFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_from_forms', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255)->nullable();
            $table->text('message')->nullable();
            $table->string('phone_number', 255)->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('user_telegram_id')->unsigned()->nullable();
            $table->string('type')->nullable();
            $table->text('service_name')->nullable();

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
        Schema::dropIfExists('application_from_forms');
    }
}
