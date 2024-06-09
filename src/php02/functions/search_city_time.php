<?php
                        // ↓後で都市名を手入力できるように
function searchCityTime($city_name)
{
require('config/cities.php');
                     // ↓配列の各要素　最後に出てくる$cityと一緒
foreach($cities as $city){
  // 　　　　↓cities.phpの配列　　↓一番上の関数の()内と一緒の変数
  if ($city['name'] === $city_name){
      //  ↓$timeになる前の、とりあえずの新しい変数　　cities.phpの配列↓
    $date_time = new DateTime('', new DateTimeZone($city["time_zone"]));
                            // ↑空文字は現在時を出す
                   // ↓format()というメソッド引出す演算子      
    $time = $date_time->format('H:i');
                       // ↑$date_timeが持つ情報を文字列に変換

    $city['time'] = $time;
    return $city;
            // ↑foreachに出てくる$cityと一緒、都市名と時間+配列追加済み
  }
}

}