<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// 事業所マスタ
    	DB::table('offices')->insert([
            'office_no' => 1,
            'office_name' => '成安事業所',
        ]);
        DB::table('offices')->insert([
            'office_no' => 2,
            'office_name' => '渋江事業所',
        ]);
        DB::table('offices')->insert([
            'office_no' => 3,
            'office_name' => '天童事業所',
        ]);
    	DB::table('offices')->insert([
            'office_no' => 4,
            'office_name' => 'あじさい事業所',
        ]);
    	DB::table('offices')->insert([
            'office_no' => 5,
            'office_name' => '管理者',
        ]);


        // 品種マスタ
        DB::table('flower_kinds')->insert([
            'kind_code' => 3,
            'kind_name' => 'テレサ',
            'office_no' => 1,
            'kind_sort_key' => 1,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 9,
            'kind_name' => 'ニューミラクル',
            'office_no' => 1,
            'kind_sort_key' => 2,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 12,
            'kind_name' => 'タイタニック',
            'office_no' => 1,
            'kind_sort_key' => 3,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 36,
            'kind_name' => 'MIX',
            'office_no' => 1,
            'kind_sort_key' => 7,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 37,
            'kind_name' => 'SPMIX',
            'office_no' => 1,
            'kind_sort_key' => 8,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 38,
            'kind_name' => '混合',
            'office_no' => 1,
            'kind_sort_key' => 9,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 40,
            'kind_name' => 'SP混合',
            'office_no' => 1,
            'kind_sort_key' => 10,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 46,
            'kind_name' => 'スノーダンス（SP）',
            'office_no' => 1,
            'kind_sort_key' => 4,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 53,
            'kind_name' => 'トゥルーズロートレック',
            'office_no' => 1,
            'kind_sort_key' => 6,
        ]);
        DB::table('flower_kinds')->insert([
            'kind_code' => 55,
            'kind_name' => 'ブルーミルフィーユ',
            'office_no' => 1,
            'kind_sort_key' => 5,
        ]);

        // 担当者マスタ
        DB::table('charge_persons')->insert([
            'charge_person_no' => 1,
            'charge_person_name' => '鈴木一郎',
            'office_no' => 1,
            'password' => 'as2014es',
        ]);
        DB::table('charge_persons')->insert([
            'charge_person_no' => 2,
            'charge_person_name' => '山田花子',
            'office_no' => 2,
            'password' => 'asukaru',
        ]);

        // 市場マスタ
        DB::table('markets')->insert([
            'market_no' => 1,
            'market_name' => 'オークネット',
            'amount' => 10.0,
            'communication_cost' => 82,
        ]);
        DB::table('markets')->insert([
            'market_no' => 2,
            'market_name' => '京都生花',
            'amount' => 9.5,
            'communication_cost' => 82,
        ]);
        DB::table('markets')->insert([
            'market_no' => 3,
            'market_name' => '東日本板橋花き',
            'amount' => 10.0,
            'communication_cost' => 82,
        ]);
        DB::table('markets')->insert([
            'market_no' => 4,
            'market_name' => '東京フラワーポート',
            'amount' => 10.0,
            'communication_cost' => 82,
        ]);

        // 箱マスタ
        DB::table('boxes')->insert([
            'box_no' => 1,
            'box_name' => '小箱',
            'size' => 49,
            'box_cost' => 72,
            'summary' => '30～40',
            'classification' => 'バラ用',
        ]);
        DB::table('boxes')->insert([
            'box_no' => 2,
            'box_name' => '中箱',
            'size' => 69,
            'box_cost' => 90,
            'summary' => '50～60',
            'classification' => 'バラ用',
        ]);
        DB::table('boxes')->insert([
            'box_no' => 3,
            'box_name' => '小箱',
            'size' => 89,
            'box_cost' => 120,
            'summary' => '70～80',
            'classification' => 'バラ用',
        ]);
        DB::table('boxes')->insert([
            'box_no' => 5,
            'box_name' => 'あじさい箱',
            'box_cost' => 80,
            'classification' => 'あじさい用',
        ]);

        // 生産数入力
        DB::table('number_of_productions')->insert([
            'office_no' => 1,
            'flower_kind_id' => 1,
            'grade' => '80',
            'flower_number' => '40',
            'box_number' => 2,
            'summary' => '葉に難あり',
        ]);
        DB::table('number_of_productions')->insert([
            'office_no' => 1,
            'flower_kind_id' => 1,
            'grade' => '70, 60',
            'flower_number' => '10, 10',
            'box_number' => 1,
            'summary' => '葉に難あり',
        ]);
        DB::table('number_of_productions')->insert([
            'office_no' => 1,
            'flower_kind_id' => 1,
            'grade' => '70',
            'flower_number' => '40',
            'box_number' => 1,
            'summary' => '葉に難あり',
        ]);
        DB::table('number_of_productions')->insert([
            'office_no' => 1,
            'flower_kind_id' => 1,
            'grade' => '70',
            'flower_number' => '40',
            'box_number' => 1,
            'summary' => '葉に難あり',
        ]);

        // 送料
        DB::table('postages')->insert([
            'market_id' => 1,
            'box_id' => 1,
            'postage' => 700,
        ]);
        DB::table('postages')->insert([
            'market_id' => 1,
            'box_id' => 2,
            'postage' => 800,
        ]);
        DB::table('postages')->insert([
            'market_id' => 1,
            'box_id' => 3,
            'postage' => 900,
        ]);
        DB::table('postages')->insert([
            'market_id' => 2,
            'box_id' => 1,
            'postage' => 750,
        ]);
    }
}
