<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($h = 0; $h < 10; $h++) {
            for ($i = 0; $i < 500; $i++) {
                DB::table('ratings')->insert([
                    'book_id' => rand(1, 3119),
                    'user_id' => $i + 1,
                    'rating' => rand(0, 5)
                ]);
            }
        }
    }
}
