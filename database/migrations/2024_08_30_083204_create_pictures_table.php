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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('searchText')->nullable()->index()->default(null);
            $table->enum('type', ["original", "thumbnail", "small", "medium", "large"])->default("original");
            $table->string('img');
            $table->string(column: 'thumbnail')->nullable()->default(null);
            $table->foreignId('run_id')->constrained()->nullable()->default(null); // Correctly sets up foreign key for `run_id`
            // $table->unsignedBigInteger('original_picture_id')->nullable()->default(null); // Define the column first
            $table->enum('processed', ["false", "true", "not needed"])->default("false"); // voucher every 10 ore 15 nubers
            $table->timestamps();
        });

        // Add foreign key to `original_picture_id`
        Schema::table('pictures', function (Blueprint $table) {
            // $table->foreign('original_picture_id')->references('id')->on('pictures')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
