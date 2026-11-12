<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {
            // ল্যান্ডিং পেজ থেকে একই মোবাইল নাম্বারে পরপর অর্ডারের মাঝে ন্যূনতম বিরতি (মিনিট), 0 = বন্ধ
            $table->unsignedInteger('landing_order_interval')->default(20)->after('reseller_wallet_min_balance');
        });
    }

    public function down(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn('landing_order_interval');
        });
    }
};
