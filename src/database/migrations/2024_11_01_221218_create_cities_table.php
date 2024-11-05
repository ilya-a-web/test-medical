<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(file_get_contents(database_path() . '/dump/cities_cities2.sql'));
        Schema::rename('city_', 'geo_city');
        Schema::rename('country_', 'geo_country');
        Schema::rename('region_', 'geo_region');
        DB::statement('ALTER TABLE geo_city ENGINE = InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
        DB::statement('ALTER TABLE geo_country ENGINE = InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
        DB::statement('ALTER TABLE geo_region ENGINE = InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo_city');
        Schema::dropIfExists('geo_country');
        Schema::dropIfExists('geo_region');
    }
}
