<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    protected $data = [
        ['id'=> 1, 'name' => 'Администратор'],
        ['id'=> 2, 'name' => 'Собственник'],
        ['id'=> 3, 'name' => 'Риэлтор']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $value) {
            DB::table('user_types')->insert($value);
        }
    }
}
