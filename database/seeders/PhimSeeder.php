<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhimSeeder extends Seeder
{
    public function run(): void
    {
        // 1. khi seeder thì t muốn xoá toàn bộ dữ liệu ở table đó
        DB::table('phims')->delete();

        // Reset id về lại 1
        DB::table('phims')->truncate();

        // 2. ta sẽ thêm mới phim bằng lệnh create
        DB::table('phims')->insert([
            [
                'ten_phim' => 'Avenger End Game',
                'slug_ten_phim' => Str::slug('Avenger End Game'),
                'dao_dien' => 'Đạo diễn phim',
                'dien_vien' => 'Thỏ, Ngáo, Sắt, Húc',
                'the_loai' => 'Hành động 2 người',
                'thoi_luong' => 130,
                'ngay_khoi_chieu' => 2022-5-12,
                'avatar' => 'https://genk.mediacdn.vn/139269124445442048/2020/2/14/1-15816746144451193748082.jpg',
                'mo_ta' => 'Phim rất hay, ahihi',
                'trailer' => 'https://genk.mediacdn.vn/',
                'tinh_trang' => 0,
            ],
        ]);
    }
}
