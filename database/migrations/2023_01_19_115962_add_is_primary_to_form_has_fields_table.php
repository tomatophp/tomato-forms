<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_has_fields', function (Blueprint $table) {
            $table->boolean('is_primary')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_has_fields', function (Blueprint $table) {
            if (Schema::hasColumn('form_has_fields', 'departure_time')) {
                $table->dropColumn('is_primary');
            }
        });
    }
};
