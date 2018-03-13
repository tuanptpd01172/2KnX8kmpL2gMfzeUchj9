<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slide_id')->unsigned()->nullable();
            $table->foreign('slide_id')->references('id')->on('slide')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('lang_id')->unsigned()->nullable();
            $table->foreign('lang_id')->references('id')->on('lang')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Title')->nullable();
            $table->string('Descriptions')->nullable();
            $table->string('url')->nullable();
            $table->string('css')->nullable();
            $table->string('Top')->nullable();
            $table->string('Bottom')->nullable();
            $table->string('Right')->nullable();
            $table->string('Left')->nullable();
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
        Schema::dropIfExists('slide_detail');
    }
}
