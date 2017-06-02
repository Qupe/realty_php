<?php

use Illuminate\Database\Seeder;

class PropertyValuesTableSeeder extends Seeder
{
    protected $path = 'database/seeds/sql/property_values.sql';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents($this->path));
    }
}
