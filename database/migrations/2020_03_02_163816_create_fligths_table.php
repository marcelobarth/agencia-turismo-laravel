<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFligthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fligths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plane_id');
            $table->unsignedBigInteger('airport_origin_id');
            $table->unsignedBigInteger('airport_destination_id');
            $table->date('date');
            $table->time('time_duration');
            $table->time('hour_output');
            $table->time('arrival_time');
            $table->double('old_price', 10, 2);
            $table->double('price', 10, 2);
            $table->integer('total_plots');
            $table->boolean('is_promotion')->default(false);
            $table->string('image', 200)->nullable();
            $table->integer('qty_stops')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('plane_id')->references('id')->on('planes');
            $table->foreign('airport_origin_id')->references('id')->on('airports');
            $table->foreign('airport_destination_id')->references('id')->on('airports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fligths');
    }
}
