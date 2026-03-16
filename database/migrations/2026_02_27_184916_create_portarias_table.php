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
        Schema::create('portarias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("number");
            $table->year("year");
            $table->text("title");
            $table->text("introduction");
            $table->text("content");
            $table->enum("status", [
                'draft',
                'pending',
                'approved',
                'rejected',
            ])->default('draft');
            $table->timestamp('published_at');
            $table->foreignId("created_by")->constrained('users');
            $table->foreignId("approved_by")->nullable()->constrained('users');
            #foreign keys with table user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portarias');
    }
};
