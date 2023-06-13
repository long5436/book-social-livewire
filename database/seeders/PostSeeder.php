<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $str = '**Lượng thuê bao tăng khi Netflix chặn chia sẻ tài khoản**
        MỸDù bị phản ứng vì áp dụng chính sách hạn chế dùng chung tài khoản, Netflix lại nhận tín hiệu tích cực khi số thuê bao mới tăng mạnh.
        
        Ngày 23/5, Netflix bắt đầu thông báo không cho các tài khoản đăng ký dịch vụ của mình tại Mỹ chia sẻ mật khẩu và quyền truy cập dịch vụ với người không ở cùng một nhà. Washington Post ghi nhận trên mạng xã hội Twitter và Facebook, nhiều người than phiền, thậm chí tuyên bố từ bỏ Netflix, chuyển sang ứng dụng thoáng hơn như Disney Plus và Max.
        
        Tuy nhiên, theo thống kê của công ty theo dõi thuê bao Antenna, từ 24 đến 27/5, Netflix đã có bốn ngày tăng trưởng người dùng cao nhất trong trong bốn năm, khi có 100.000 lượt đăng ký mới mỗi ngày tính riêng ở Mỹ.
        
        Số lượng tài khoản Netflix tăng trưởng mạnh hơn số lượng huỷ. Ảnh: AFP
        
        Số tài khoản Netflix tăng mạnh hơn số lượng hủy. Ảnh: AFP
        
        Sau đó, số đăng ký mới trung bình hàng ngày vẫn đạt 73.000 lượt, tăng 102% so với 60 ngày trước đó. Mức này còn cao hơn giai đoạn bị phong tỏa trong Covid-19 hồi tháng 3 và 4/2020. Tuy nhiên, số người hủy tài khoản Netflix cũng tăng 25,6% so với trung bình hai tháng trước.
        
        Ngoài việc đăng ký mới, người dùng Netflix cũng có thể bổ sung thành viên vào tài khoản của mình với giá 7,99 USD mỗi tháng.
        
        Các số liệu trên có lợi cho Netflix, nhưng đây mới là thống kê của bên thứ ba là Antenna, chưa phải từ phía Netflix. Các gói dịch vụ của nền tảng vốn cho phép tạo tối đa năm hồ sơ để dùng chung giữa các thành viên gia đình. Tuy nhiên, nhiều người lợi dụng chính sách này để bán tài khoản cho người lạ, khiến hãng thất thu. Hãng cho biết hơn 100 triệu người đang sử dụng dịch vụ bằng tài khoản của người thân, bạn bè.
        
        Nhằm đánh giá phản ứng của người dùng, Netflix đã nhiều lần "rào trước" về kế hoạch chặn chia sẻ, cho biết họ sẽ nhận biết việc sử dụng lậu dựa trên địa chỉ IP, thông tin thiết bị và hoạt động của tài khoản.
        
        Netflix hiện dẫn đầu ngành streaming video với 223 triệu người dùng toàn cầu và giá trị thị trường 128 tỷ USD. Hiện có một số dịch vụ với tính năng tương tự vẫn cho phép người dùng chia sẻ tài khoản, nhưng giới chuyên gia cảnh báo họ có thể tiếp bước Netflix trong tương lai. "Netflix đang tiên phong và tôi nghĩ các nền tảng khác sẽ hành động tương tự", Alicia Reese, chuyên gia phân tích của Wedbush, nhận định.';
        $startDateTime = Carbon::now()->subDays(7); // Thời gian bắt đầu khoảng thời gian (7 ngày trước)
        $endDateTime = Carbon::now(); // Thời gian hiện tại

        for ($i = 0; $i < 20; $i++) {
            $randomTime = Carbon::createFromTimestamp(rand($startDateTime->timestamp, $endDateTime->timestamp));

            DB::table('posts')->insert([
                'book_id' => rand(1, 3100),
                'user_id' => rand(1, 500),
                'name' => 'Sách này hay lắm nè cả nhà',
                'slug' => Str::of('Sách này hay lắm nè cả nhà')->slug('-'),
                'content' => strip_tags($str),
                'created_at' => $randomTime
            ]);
        };
    }
}
