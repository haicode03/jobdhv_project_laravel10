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
        if (!Schema::hasTable('jobs')) {
            Schema::create('jobs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('wage');
                $table->text('description');
                $table->timestamps();
                //Tạo khóa chính ở migrations khác
                $table->unsignedInteger('category_id');
                $table->unsignedInteger('company_id');
                $table->unsignedInteger('location_id');
                $table->unsignedInteger('job_type_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};