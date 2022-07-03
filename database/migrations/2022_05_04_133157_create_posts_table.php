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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('post_content');
            $table->string('featured_image')->nullable();
            $table->string('large_image')->nullable();
            $table->integer('views')->default(0);
            $table->integer('shares')->default(0);
            $table->unsignedBigInteger('category_id')->nullable()->default(0);
            $table->unsignedBigInteger('user_id')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
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
};
