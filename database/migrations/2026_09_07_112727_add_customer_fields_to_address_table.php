<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('address', function (Blueprint $table) {
            if (!Schema::hasColumn('address', 'LstNm')) {
                $table->string('LstNm', 60)->nullable()->after('FstNm');
            }
            if (!Schema::hasColumn('address', 'TP2')) {
                $table->string('TP2', 20)->nullable()->after('TP1');
            }
            if (!Schema::hasColumn('address', 'BRNo')) {
                $table->string('BRNo', 50)->nullable()->after('IDNo');
            }
            if (!Schema::hasColumn('address', 'TINNo')) {
                $table->string('TINNo', 50)->nullable()->after('BRNo');
            }
            if (!Schema::hasColumn('address', 'AddressLine2')) {
                $table->string('AddressLine2', 250)->nullable()->after('Address');
            }
            if (!Schema::hasColumn('address', 'Locality')) {
                $table->string('Locality', 100)->nullable()->after('AddressLine2');
            }
            if (!Schema::hasColumn('address', 'Town')) {
                $table->string('Town', 100)->nullable()->after('Locality');
            }
            if (!Schema::hasColumn('address', 'City')) {
                $table->string('City', 100)->nullable()->after('Town');
            }
            if (!Schema::hasColumn('address', 'PostalCode')) {
                $table->string('PostalCode', 20)->nullable()->after('City');
            }
        });
    }

    public function down(): void
    {
        Schema::table('address', function (Blueprint $table) {
            $columns = ['LstNm', 'TP2', 'BRNo', 'TINNo', 'AddressLine2', 'Locality', 'Town', 'City', 'PostalCode'];
            $existing = array_filter($columns, fn($col) => Schema::hasColumn('address', $col));
            if (!empty($existing)) {
                $table->dropColumn(array_values($existing));
            }
        });
    }
};
