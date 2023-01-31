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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();

            //Set type of filed like text, email, number, select, checkbox, radio, textarea, file, date, time, datetime, password
            $table->string('type')->default('text')->nullable();

            //Set Name and Key for this filed
            $table->json('label');
            $table->json('placeholder')->nullable();
            $table->json('hint')->nullable();
            $table->string('key')->unique()->index();

            //Set Default value for this field
            $table->string('default')->nullable();

            //Check if Field is Has options like Select
            $table->boolean('has_options')->default(0)->nullable();

            //Is Filed Required?
            $table->boolean('is_required')->default(0)->nullable();
            $table->json('required_message')->nullable();

            //Is Field Reactive?
            $table->boolean('is_reactive')->default(0)->nullable();
            $table->string('reactive_field')->nullable();
            $table->string('reactive_where')->nullable();

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
        Schema::dropIfExists('fields');
    }
};
