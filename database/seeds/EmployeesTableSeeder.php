<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employees')->insert([
            'employee_name' => 'John Doe',
        ]);

        DB::table('employees')->insert([
            'employee_name' => 'Rose Smith',
        ]);

        DB::table('employees')->insert([
            'employee_name' => 'Adam Brown',
        ]);
    }
}
