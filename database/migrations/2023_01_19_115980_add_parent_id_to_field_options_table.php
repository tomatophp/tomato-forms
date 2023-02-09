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
        Schema::table('field_options', function (Blueprint $table) {
            $table->foreignId('parent_id')->nullable()->constrained('field_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('field_options', function (Blueprint $table) {
            if (Schema::hasColumn('field_options', 'parent_id')) {
                $table->dropColumn('parent_id');
            }
        });
    }
};
