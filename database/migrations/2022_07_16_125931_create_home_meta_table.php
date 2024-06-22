<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_meta', function (Blueprint $table) {
            $table->id();
            $table->string('meta_description', 1000);
            $table->string('meta_description_ar', 1000);
            $table->string('keywords', 1000);
            $table->string('keywords_ar', 1000);
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
        Schema::dropIfExists('home_meta');
    }
}
