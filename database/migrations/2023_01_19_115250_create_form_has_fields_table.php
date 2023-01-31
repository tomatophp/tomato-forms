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
        Schema::create('form_has_fields', function (Blueprint $table) {
            $table->foreignId('form_id')->constrained('forms')->onDelete('cascade');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->integer('order')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_has_fields');
    }
};
