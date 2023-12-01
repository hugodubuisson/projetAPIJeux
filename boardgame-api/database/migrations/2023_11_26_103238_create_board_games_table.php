<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('board_games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable();
            $table->string('video')->nullable();
            $table->integer('number_gamer')->nullable();
            $table->integer('playing_time')->nullable();
            $table->integer('complexity')->nullable();
            $table->float('rating', 2, 1)->nullable();
            $table->integer('number_rating')->default(0);
            $table->date('published_date')->nullable();
            $table->integer('rank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_games');
    }
};
