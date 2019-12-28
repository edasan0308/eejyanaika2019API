<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ToiletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ファイルが存在しているかチェックする
        if (($handle = fopen("2019ToyohashiMatsuri_toilet.csv", "r")) !== FALSE) {
            // 1行ずつfgetcsv()関数を使って読み込む
            while (($data = fgetcsv($handle))) {
                DB::table('Toilets')->insert([
                    'title' => $data[0],
                    'lat' => $data[1],
                    'long' => $data[2],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            fclose($handle);
        }
        //ファイルが存在しない場合
        else {
            echo 'ERROR! CSV is not found';
        }
    }
}
