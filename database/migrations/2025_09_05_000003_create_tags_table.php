<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('book_tag', function(Blueprint $table) {
            $table->id();

            $table->foreignId('book_id')->constrained('id')->on('books');
            $table->foreignId('tag_id')->constrained('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_tag');
        Schema::dropIfExists('tags');
    }
};