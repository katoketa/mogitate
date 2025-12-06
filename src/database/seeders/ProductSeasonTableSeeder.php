<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                // キウイ、秋
                'product_id' => 1,
                'season_id' => 3,
            ],
            [
                // キウイ、冬
                'product_id' => 1,
                'season_id' => 4,
            ],
            [
                // ストロベリー、春
                'product_id' => 2,
                'season_id' => 1,
            ],
            [
                // オレンジ、冬
                'product_id' => 3,
                'season_id' => 4,
            ],
            [
                // スイカ、夏
                'product_id' => 4,
                'season_id' => 2,
            ],
            [
                // ピーチ、夏
                'product_id' => 5,
                'season_id' => 2,
            ],
            [
                // シャインマスカット、夏
                'product_id' => 6,
                'season_id' => 2,
            ],
            [
                // シャインマスカット、秋
                'product_id' => 6,
                'season_id' => 3,
            ],
            [
                // パイナップル、春
                'product_id' => 7,
                'season_id' => 1,
            ],
            [
                // パイナップル、夏
                'product_id' => 7,
                'season_id' => 2,
            ],
            [
                // ブドウ、夏
                'product_id' => 8,
                'season_id' => 2,
            ],
            [
                // ブドウ、秋
                'product_id' => 8,
                'season_id' => 3,
            ],
            [
                // バナナ、夏
                'product_id' => 9,
                'season_id' => 2,
            ],
            [
                // メロン、春
                'product_id' => 10,
                'season_id' => 1,
            ],
            [
                // メロン、夏
                'product_id' => 10,
                'season_id' => 2,
            ],
        ];
        
        foreach ($params as $param) {
            DB::table('product_season')->insert($param);
        }
    }
}
