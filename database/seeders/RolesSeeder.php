<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define roles
        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Recruiter'],
            ['name' => 'Candidate'],
        ]);
    }
}
