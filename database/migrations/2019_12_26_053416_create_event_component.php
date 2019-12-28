<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventComponent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('place');
            $table->integer('charge');
            $table->double('lat', 10, 6);
            $table->double('long', 10, 6);
            $table->string('tag');
            $table->string('info');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('url');
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
        Schema::dropIfExists('Event-components');
    }
}
