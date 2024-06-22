<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('floors');
            $table->string('email');
            $table->string('phone');
            $table->string('message');
            
            $table->integer('door')->nullable();
            $table->integer('rail')->nullable();
            $table->integer('cabin')->nullable();
            $table->integer('motor')->nullable();
            $table->integer('controller')->nullable();
            $table->integer('wire')->nullable();

            $table->integer('stage');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('stages');
    }
}
