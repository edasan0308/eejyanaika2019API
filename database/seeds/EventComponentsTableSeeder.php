<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ファイルが存在しているかチェックする
        if (($handle = fopen("2019ToyohashiMatsuri_event.csv", "r")) !== FALSE) {
            // 1行ずつfgetcsv()関数を使って読み込む
            while (($data = fgetcsv($handle))) {
                DB::table('Components')->insert([
                    'title' => $data[0],
                    'place' => $data[1],
                    'charge' => $data[2],
                    'lat' => $data[3],
                    'long' => $data[4],
                    'tag' => $data[5],
                    'info' => $data[6],
                    'start' => date('Y-m-d H:i:s', strtotime($data[7])),
                    'end' => date('Y-m-d H:i:s', strtotime($data[8])),
                    'url' => $data[9],
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
