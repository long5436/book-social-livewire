<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CrawlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $jsonFilePath =  __DIR__ . '/json/kinh-te-quan-ly.json';

        // $jsonString = file_get_contents($jsonFilePath);
        // $jsonData = json_decode($jsonString);


        // foreach ($jsonData as $key => $value) {
        //     DB::table('books')->insert([
        //         'name' => $value->name,
        //         'description' => ' lorem',
        //         'photo' => $value->photo,
        //     ]);
        // }

        $description = 'Thời gian là vô giá nhưng những điều chúng ta làm được trong một khoảng thời gian sẽ có giá trị nhất định của nó. Nếu bạn dành nhiều thời gian cho những việc có ích và phát triển bản thân từng ngày thì bạn sẽ trở thành một con người khác biệt.
        **Và nếu bạn vẫn còn “ngủ dài” và lười biếng, không suy nghĩ, bận tâm đến cuộc đời mình, “Đời Ngắn Ngủi Đừng Ngủ Dài” sẽ giúp bạn thức tỉnh.**
       Sách bao gồm 101 câu chuyện nhỏ về những vấn đề xoay quanh cuộc sống mà tác giả đã tự trải nghiệm qua rồi tổng hợp viết lại. Các câu chuyện được trình bày theo những chủ đề riêng biệt nên rất dễ để theo dõi và rút ra được thông điệp ý nghĩa mà tác giả đem đến. Những chủ đề chính như gia đình, sức khỏe, giá trị bản thân, sống kỉ luật,... đều là những điều thiết yếu cần có trong cuộc sống.
       **Đọc “Đời Ngắn Đừng Ngủ Dài”, bạn sẽ có thêm động lực, có tinh thần tốt hơn để làm việc và học tập.**
       Thêm vào đó, điều quan trọng hơn cả là thời gian, bạn cần phát huy hết năng lực của mình mỗi ngày, từ bỏ thói quen lề mề, bỏ dở mọi công việc. Nhờ vậy, quá trình thay đổi của bạn sẽ tích cực, hoàn thiện hơn. Với lời văn không hoa mỹ những cũng không quá khô khan, chán nản, bạn đọc có thể nhanh chóng hiểu được tư tưởng của tác giả và dễ tiếp nhận được ý nghĩa của cuốn sách.';


        $directoryPath = __DIR__ . '/jsons';

        $files = scandir($directoryPath);

        $indexIdCate = 1;
        $indexIdBook = 1;

        foreach ($files as $file) {
            $filePath = $directoryPath . '/' . $file;

            if (pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
                $jsonString = file_get_contents($filePath);
                $jsonData = json_decode($jsonString);

                // Bây giờ, $jsonData chứa dữ liệu được tải từ tệp JSON
                // Bạn có thể truy cập vào các trường và giá trị trong tệp JSON như một đối tượng hoặc mảng PHP

                DB::table('categories')->insert([
                    'name' => $jsonData->name,
                    'slug' => Str::of($jsonData->name)->slug('-'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                foreach ($jsonData->data as $key => $value) {
                    DB::table('books')->insert([
                        'name' => $value->name,
                        'slug' => Str::of($value->name)->slug('-'),
                        'description' => $description,
                        'photo' => $value->photo,
                        'read_count' => 0,
                        'created_at' => Carbon::now()->addSeconds($indexIdBook)->format('Y-m-d H:i:s')
                    ]);

                    DB::table('book_category')->insert([
                        'category_id' => $indexIdCate,
                        'book_id' => $indexIdBook,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    $indexIdBook++;
                }

                $indexIdCate++;
            }
            // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            // $out->writeln("cate index: " . $filePath);
        }
    }
}
