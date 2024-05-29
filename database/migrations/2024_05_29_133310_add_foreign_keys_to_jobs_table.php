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
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->change();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedInteger('company_id')->change();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->unsignedInteger('location_id')->change();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->unsignedInteger('job_type_id')->change();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['company_id']);
            $table->dropForeign(['location_id']);
            $table->dropForeign(['job_type_id']);
        });
    }
};
