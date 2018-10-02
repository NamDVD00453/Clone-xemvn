<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('type');
            $table->string('title');
            $table->string('description');
            $table->string('handle_url');
            $table->string('thumbnail', 500);
            $table->integer('thumbnail_width');
            $table->integer('thumbnail_height');
            $table->string('content', 255)->unique();
            $table->integer('content_width');
            $table->integer('content_height');
            $table->string('duration');
            $table->string('source')->nullable();
            $table->integer('seen_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->integer('category_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('status');
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
