<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->string("title");
            $table->text("details")->nullable();
            $table->string("tags")->nullable();
            $table->string("person_incharge")->nullable();
            $table->integer("created_by")->unsigned();
            $table->string('template_path')->nullable();
            $table->string('font_family')->default('sans-serif');
            $table->string('font_color')->default('#333');
            $table->integer('font_size')->default(126);
            $table->timestamps();
            $table->foreign("created_by")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
