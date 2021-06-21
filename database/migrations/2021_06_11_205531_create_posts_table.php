<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('images');
            $table->integer('phone');
            $table->foreignId('category_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable()
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('child_category_id')->nullable()
            ->constrained()
            ->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
