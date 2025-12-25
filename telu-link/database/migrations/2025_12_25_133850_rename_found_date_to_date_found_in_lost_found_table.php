<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('lost_found', function (Blueprint $table) {
            $table->renameColumn('found_date', 'date_found');
        });
    }

    public function down(): void
    {
        Schema::table('lost_found', function (Blueprint $table) {
            $table->renameColumn('date_found', 'found_date');
        });
    }
};
