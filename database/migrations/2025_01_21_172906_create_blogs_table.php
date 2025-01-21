<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longtext('description');

            // shortcut for creating the foreignId, but this will create a bigint data type
            // $table->foreignId('status_id')->constrained();
            // $table->foreignId('category_id')->constrained();

            $table->unsignedInteger('status_id');
            $table->unsignedInteger('category_id');

            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
