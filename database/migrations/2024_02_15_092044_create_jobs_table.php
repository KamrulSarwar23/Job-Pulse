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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('address');
            $table->string('salary');
            $table->date('end_date');
            $table->integer('vacancy');
            $table->text('description');
            $table->text('responsibility');
            $table->text('qualifications');
            $table->string('benefits');
            $table->text('business');
            $table->enum('office_time', ['fulltime', 'partime'])->default('fulltime');
            $table->enum('office_from', ['remote', 'office'])->default('office');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
