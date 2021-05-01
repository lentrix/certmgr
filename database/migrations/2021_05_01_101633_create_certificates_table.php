<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->unsigned();
            $table->string("recipient_name");
            $table->string("recipient_designation")->nullable();
            $table->string("recipient_org")->nullable();
            $table->timestamp("issued_at");
            $table->bigInteger('issued_by')->unsigned();
            $table->string("remarks")->nullable();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('issued_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
