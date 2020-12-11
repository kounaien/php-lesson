<?php

// 文字列の長さ返す
//算桁ごとのカンマ区切り
//配列を渡すとシャッフル
//配列内の重複を削除
$input = [32, 32, 4, '4'];
strlen('hello');
number_format(324242);
shuffle($input);
array_unique($input);

 $name = 'taguchi';
 $score = 32.54;

 $info = "[$name][$score]"; // [taguchi][32.54]
//  echo $info . PHP_EOL;
 
//表示の幅を設定したいだとか、小数点以下の桁数を指定したかったとすると
//文字列なら%s, 整数なら%d, 浮動小数点数なら%f
//その後に埋め込みたい値をカンマ区切りで渡す
//表示幅を指定するには％のあとに書くマイナスで左寄せ
//%f10.2　10は10桁の幅指定、小数点以下は2桁分に幅指定　また10の前に0を書くと空白をゼロで埋める

$info = sprintf("[%015s][%10.2f]", $name, $score);//[        taguchi][     32.54]
// echo $info . PHP_EOL;
$info = sprintf("[%-15s][%010.2f]", $name, $score);//[taguchi        ][0000032.54]
// echo $info . PHP_EOL;

$input2 = ' dot_taguchi    ';
$input2 = trim($input2);
// echo strlen($input2) . PHP_EOL;
// echo strpos($input2, '_') . PHP_EOL;
$input2 = str_replace('_', '-', $input2);
// echo $input2 . PHP_EOL;

$input2 = '　こんにちは　';
$input2 = trim($input2);

// mb_をつけないとに保護なので門司市の抽出位置がおかしくなるので
//日本語を扱うにはマルチバイトに対応した別の関数を使う必要があるmb_strlen
//このように日本語を使うには注意が必要な関数もあつ

mb_strlen($input2) . PHP_EOL;
mb_strpos($input2, 'に') . PHP_EOL;

$input2 = str_replace('にち', 'ばん', $input2);
$input2 . PHP_EOL;

//固定長データを扱う
//2020001Item~A  1200 空白込の19桁
//最初の０文字目から７文字目の８桁分は日付のデータ
// 8文字目から８桁分が商品名のデータそして１６文字目から４桁分が数量のデータ　
//こうしたデータでそれぞれの値を切り出したかった場合、substr()という関数
//substr(文字列,　位置,　桁数)
//substr_replace(文字列,　置換文字列,　位置,　桁数)
//したがって商品名を置換したいなら　substr_replace(文字列, 'Item-B'  , 8, 8)


$input3 = '20200329Item-A  1200';
$input3 = substr_replace($input3, 'Item-B  ', 8, 8);

$date = substr($input3, 0, 8);

$product = substr($input3, 8, 8);

$amount = substr($input3, 16, 4); //4は省略可能

echo $date . PHP_EOL . $product . PHP_EOL;
echo number_format($amount) . PHP_EOL;

