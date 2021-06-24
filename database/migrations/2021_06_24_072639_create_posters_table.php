<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text("content");
            $table->boolean('is_published') ->default(false);
            $table->timestamps();
            $table->unsignedBigInteger("user_id")->unsigned()->index();
            $table->unsignedBigInteger("category_id")->unsigned()->index();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posters');
    }
}
