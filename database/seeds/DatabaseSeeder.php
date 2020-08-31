<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('worlds')->insert([
            'name' => 'Assombra',
            'name' => 'Belobra',
            'name' => 'Descubra',
            'name' => 'Dibra',
            'name' => 'Ferobra',
            'name' => 'Gentebra',
            'name' => 'Honbra',
            'name' => 'Inabra',
            'name' => 'Javibra',
            'name' => 'Kalibra',
            'name' => 'Libertabra'
        ]);
    }
}
