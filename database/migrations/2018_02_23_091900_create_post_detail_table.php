<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('lang_id');
            $table->foreign('lang_id')->references('id')->on('lang')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('color_id');
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Title')->nullable();
            $table->string('Descriptions')->nullable();
            $table->string('Avartar')->nullable();
            $table->string('Price')->nullable();
            $table->string('Kind')->nullable();
            $table->string('View')->nullable();
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
        Schema::dropIfExists('post_detail');
    }
}
