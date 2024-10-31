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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->date('birthday');
            $table->integer('years');
            $table->enum('gender',['male','female']);
            $table->string('code');
            $table->text('contacts_patient');
            $table->text('contacts_relatives');
            $table->integer('region_id');
            $table->integer('city_id');
            $table->text('address');
            $table->text('phones');
            $table->text('emails');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
