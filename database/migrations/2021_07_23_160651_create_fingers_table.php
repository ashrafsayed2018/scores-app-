<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFingersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fingers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text('ipaddress')->nullable();
            $table->text('country')->nullable();
            $table->text('finger')->nullable();
            $table->text('browser')->nullable();
            $table->longText('flash')->nullable();
            $table->text('canvas')->nullable();
            $table->text('connection')->nullable();
            $table->text('cookies')->nullable();
            $table->text('display')->nullable();
            $table->longText('fonts')->nullable();
            $table->text('formfields')->nullable();
            $table->text('java')->nullable();
            $table->text('language')->nullable();
            $table->text('os')->nullable();
            $table->text('touch')->nullable();
            $table->text('plugins')->nullable();
            $table->text('useragent')->nullable();
            $table->integer('calls')->nullable();
            $table->integer('blocked')->nullable();
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
        Schema::dropIfExists('fingers');
    }
}
