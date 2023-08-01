<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_status_abs')->insert(
            [
                ['status' => 'In Review'],
                ['status' => 'Accepted'],
                ['status' => 'Rejected'],

            ],

        );
    }
}