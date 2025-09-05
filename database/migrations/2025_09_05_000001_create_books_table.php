<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $table = Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('pages_count')->unsigned();
            $table->string('isbn')->unique();
            $table->timestamps();

            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
        });

        
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
