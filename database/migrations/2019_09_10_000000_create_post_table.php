<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts',function(Blueprint $table) {
            $table->increments('id');
            $table->string('identifier')->index();
            $table->string('slig')->unique()->index();
            $table->string('title');
            $table->text('body');
            $table->text('extra');
            $table->timestamp();

            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}