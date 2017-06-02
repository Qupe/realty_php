<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    protected $path = 'database/seeds/sql/properties.sql';

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
