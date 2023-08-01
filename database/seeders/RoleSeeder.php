<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('role_user')->insert([
            ['nama_role' => 'Admin'],
            ['nama_role' => 'Presenter'],
            ['nama_role' => 'Participant'],
            ['nama_role' => 'Reviewer']
        ]);
    }
}