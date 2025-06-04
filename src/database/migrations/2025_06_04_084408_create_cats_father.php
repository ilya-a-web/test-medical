<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats_father', function (Blueprint $table) {
            $table->foreignId('father_id')->constrained('cats')->onDelete('cascade');
            $table->foreignId('kitten_id')->constrained('cats')->onDelete('cascade');
            $table->primary(['father_id', 'kitten_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats_father');
    }
};
