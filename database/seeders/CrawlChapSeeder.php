<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CrawlChapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directoryPath = __DIR__ . '/jsons/chaps';

        $files = scandir($directoryPath);

        $indexIdChap = 1;

        foreach ($files as $file) {
            $filePath = $directoryPath . '/' . $file;

            if (pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
                $jsonString = file_get_contents($filePath);
                $jsonData = json_decode($jsonString);

                foreach ($jsonData->data as $key => $value) {

                    DB::table('book_chap')->insert([
                        'book_id' => $jsonData->id,
                        'chap_id' => $indexIdChap,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('chaps')->insert([
                        'book_id' => $jsonData->id,
                        'name' => $value->name,
                        'slug' => Str::of($value->name)->slug('-'),
                        'order_by' => $value->order + 1,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    DB::table('chap_contents')->insert([
                        'chap_id' => $indexIdChap,
                        'content' => $value->content,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    $indexIdChap++;
                }
            }
        }
    }
}
