<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('publisher_id')->on('publishers')->nullable()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publishers');
    }
};
