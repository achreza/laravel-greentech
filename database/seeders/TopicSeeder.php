<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topic')->insert(
            [
                ['nama_topic' => 'Environmental Science'],
                ['nama_topic' => 'Natural Science and Technology'],
                ['nama_topic' => 'Sustainable Materials and Resources'],
                ['nama_topic' => 'Green Technology and Engineering']

            ],

        );
    }
}