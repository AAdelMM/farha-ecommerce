<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ar');
            $table->string('description', 3000);
            $table->string('desc_ar', 3000);
            $table->string('image');
            $table->string('meta_description', 1000);
            $table->string('meta_description_ar', 1000);
            $table->string('keywords', 1000);
            $table->string('keywords_ar', 1000);
            $table->integer('post_tag_id');
            $table->integer('shown')->default(1);
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
        Schema::dropIfExists('post');
    }
}
