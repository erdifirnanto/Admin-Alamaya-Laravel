<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('domain')->nullable();
            $table->string('status')->nullable();
            $table->date('join_date')->default(now());
            $table->date('expired')->default(now());
            // $table->date('expired')->default(DB::raw('DATE_ADD(CURDATE(), INTERVAL 1 YEAR)'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
