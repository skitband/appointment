<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('services')->insert([
            'service_name' => 'Hair Cut',
            'service_description' => 'Hair cut professional',
            'service_duration_mm' => 1500,
        ]);

        DB::table('services')->insert([
            'service_name' => 'Massage',
            'service_description' => 'Thai massage',
            'service_duration_mm' => 3600,
        ]);

        DB::table('services')->insert([
            'service_name' => 'Hair Rebond',
            'service_description' => 'Hair rebonding any length',
            'service_duration_mm' => 7200,
        ]);

        DB::table('services')->insert([
            'service_name' => 'Hot Oil',
            'service_description' => 'Hot oil and Wax',
            'service_duration_mm' => 1800,
        ]);

        DB::table('services')->insert([
            'service_name' => 'Waxxing',
            'service_description' => 'Removal of unwanted hair in body',
            'service_duration_mm' => 1800,
        ]);
    }
}
