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

$date . PHP_EOL . $product . PHP_EOL;
number_format($amount) . PHP_EOL;

//文字列を検索置換
$input4 = 'Call us at 03-3001-1256 or 03-3015-3222';
//preg_match()という関数を使う　第一引数に検索したいパターン、第荷引数に検索したい文字列、検索した格納する変数
//正規表現スラッシュで囲んでバックスラッシュで数値が四桁分。。。。
$pattern = '/\d{2}-\d{4}-\d{4}/';
preg_match_all($pattern, $input4, $mathes);
print_r($mathes);

//preg_match()は最初に見つかった結果だけを$matchesに格納していたがすべての見つかった結果を格納したい場合は
//preg_match_all()を使う

//番号を伏せ字に置換してみる　パターンに応じて置換するにはpreg_replace
$input4 = preg_replace($pattern, '**-****-****', $input4);
$input4 . PHP_EOL;
//Call us at **-****-**** or **-****-****∫

$d = [2020, 11, 15];
"$d[0]-$d[1]-$d[2]" . PHP_EOL;
implode('-', $d) . PHP_EOL; //区切り文字で配列の要素を連結
//2020-11-15

$t = '17:32:45';
print_r(explode(':', $t)); ////コロンで$tを区切ってりそれぞれの要素を持つ配列を返す


//数学関連の関数
$n = 5.6284;

ceil($n) . PHP_EOL;//切り上げ小数点以下
floor($n) . PHP_EOL;//小数点以下切り捨て
round($n) . PHP_EOL;// 四捨五入して整数にする
round($n, 2) . PHP_EOL;//小数点以下２桁になるように四捨五入
mt_rand(1, 6)  .  PHP_EOL;//乱数を生成　１以上６以下の整数値を生成
max(4, 9, 7) . PHP_EOL;//最大値
min(7, 3, 1) . PHP_EOL;//最小値
M_PI . PHP_EOL;// 定数
M_SQRT2 . PHP_EOL;// 定数


//配列の要素を変更　先頭と末尾　
$arr2 = [23, 52, 24];

array_unshift($arr2, 10, 20);//先頭に要素を足す
array_push($arr2, 123, 432);//末尾に要素を足す
$arr2[] = 323;//一つだけの要素の追加だと添え字なしで値を代入する最後に

array_shift($arr2);//一つづつしか削除できない
array_pop($arr2);//末尾から一つづつしか削除できない
print_r($arr2);

