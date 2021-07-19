<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->unsigned();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->bigInteger('followed_id')->unsigned()->nullable();
            $table->string('score_type');
            $table->integer('scores')->default(0);
            $table->integer('used')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('followed_id')->references('following_user_id')->on('follows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
