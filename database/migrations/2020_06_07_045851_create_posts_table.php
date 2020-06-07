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
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->mediumText('cover_image')->nullable();
            $table->longText('markdown');
            $table->dateTime('published_at')->nullable();
            $table->mediumText('source');
            $table->mediumText('canonical');
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
