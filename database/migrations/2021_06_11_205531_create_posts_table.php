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
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('phone');
            $table->unsignedInteger('active')->default(0);
            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sub_category_id')->nullable()
                ->constrained()
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('child_category_id')->nullable()
                ->constrained()
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('view_count')->unsigned()->default(0);

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
