<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Replaces the single date + time with a preferred date range
     * (preferred_date = start, preferred_date_end = end). Time is removed.
     */
    public function up(): void
    {
        Schema::table('demo_requests', function (Blueprint $table) {
            $table->date('preferred_date_end')->nullable()->after('preferred_date');
        });

        if (Schema::hasColumn('demo_requests', 'preferred_time')) {
            Schema::table('demo_requests', function (Blueprint $table) {
                $table->dropColumn('preferred_time');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demo_requests', function (Blueprint $table) {
            $table->time('preferred_time')->nullable();
        });

        if (Schema::hasColumn('demo_requests', 'preferred_date_end')) {
            Schema::table('demo_requests', function (Blueprint $table) {
                $table->dropColumn('preferred_date_end');
            });
        }
    }
};
