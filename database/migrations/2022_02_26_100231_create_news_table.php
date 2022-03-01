<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->nullable();
            $table->string('title');
            $table->string('url');
            $table->string('imageUrl')->nullable();
            $table->string('newsSite')->nullable();
            $table->longText('summary');
            $table->string('publishedAt')->nullable();
            $table->string('updatedAt')->nullable();
            $table->boolean('featured');
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
        Schema::dropIfExists('news');
    }
};
