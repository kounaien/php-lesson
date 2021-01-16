<?php

//array_slice(配列、位置、個数) 切り出しあらたな配列を生成
$scores = [20, 30, 40, 50, 60, 70];

$partial = array_slice($scores, 2, 3);
//最後までを指定するときは最後の引数は省略可能
//位置にはマイナスの値も使うことができる　末尾から-1, -2と呼ぶ０からではない
print_r($scores);
print_r($partial);

//array_splice($a, 1, 2, 要素) 一番目の位置から個数分削除するそしてその位置に要素の追加する際最後の引数に要素
//もとの配列を変更する

$scores2 = [10, 20, 30, 40];
array_splice($scores2, 2, 2, 100);
array_splice($scores2, 2, 0, [200, 300]);//複数の要素を挿入するなら配列の形そして要素の追加だけ行うなら削除を０に
print_r($scores2);

sort($scores2); //値は小さい順に並び替える
rsort($scores2);//値を大きい順に並び替える
shuffle($scores2);//実行するたびに値をシャッフルしてくれる これらはもとの配列を変更する
print_r($scores2);
$picked = array_rand($scores2, 2);///配列からランダムに要素を２個ピックアップ　ここで返されるのはキー
$scores[$picked[0]] . PHP_EOL; //帰ってくるのは$scoresのキーの方なので変数に代入した添字で出す
$scores[$picked[1]] . PHP_EOL; 

//要素を一気に埋めてくれる
$scores3 = array_fill(0,5, 10);
$scores4 = range(0, 10, 2);
//最後の引数は２きざみで

print_r($scores4);
array_sum($scores4) . PHP_EOL;
max($scores4) . PHP_EOL;
min($scores4) . PHP_EOL;
array_sum($scores4) / count($scores4) . PHP_EOL;

//array_merge 合わせた配列
//aray_diff 引数1から引数2の要素を引いて残ったものを配列
//aray_intersect　共通の要素を抽出し配列
$a = [3, 4, 8];
$b = [4, 8, 12];

$merged = array_merge($a, $b);
//$merged = [...$a, ...$b]; //mergedと一緒　大カッコの中で展開しただけこれはPHP7.4からスプレッド構文使える

$uniques = array_unique($merged);
print_r($uniques);
$diff = array_diff($a, $b);
print_r($diff);
$common = array_intersect($a, $b);
print_r($common);

//array_map($n, $s)//何らかの関数とその配列を渡したとして配列の全てに適用氏新しい配列を返す$nは関数
$prices = [10, 20, 30];
$newPrices = array_map(
function ($n) { return $n * 1.1 ;}, 
//リターンだけで終わる処理ならアロー関数使える7.4から
// fn($n) => $n * 1.1,
 $prices
);
print_r($newPrices);

//array_fillter'$a, $fn)それぞれの要素に trueかfalseを適用する関数をかけてあげてtrueのみかえす配列を作る
$numbers = range(1, 10);

$evenNumbers = array_filter(
  $numbers, function($n) {
    if ($n % 2 === 0) {
    return true;
  } else {
    return false;
  }
}
  // return ($n) => % 2 === 0
);

print_r($evenNumbers);

//array_keys  array_values
$scores5 = [
  'taguchi' => 80,
  'hayashi' => 30,
  'kikuchi' => 10,
];

$keys = array_keys($scores5);
print_r($keys);
$values  = array_values($scores5);
print_r($values);

//特定のキーや値があるか調べたい場合
if (array_key_exists('taguchi', $scores5) === true) {
  echo 'taguchi is here' . PHP_EOL;
}

//値が配列の中にあるかどうか調べるにはin_array()
if (in_array(80, $scores5) === true) {
  echo '80 is in here' . PHP_EOL;
}

//値を検索して対応するキーを返す
echo array_search(80, $scores5) . PHP_EOL;

// sort() rsort keyが削除され連番になる
//asort arsort keyが削除されない
asort($scores5);
print_r($scores5);
arsort($scores5);
print_r($scores5);

//ksort krsort keyのほうでソートする
ksort($scores5);
print_r($scores5);
krsort($scores5);
print_r($scores5);

//usort ソートしたい配列を渡してあげる関数にはPHPが要素を並び替えるときに、2つの値をどう比較するか定義
$data = [
  ['name' => 'tagucni', 'score' => 80],
  ['name' => 'kikuchi', 'score' => 60],
  ['name' => 'hayashi', 'score' => 70],
  ['name' => 'tamachi', 'score' => 60],
];
usort(
  $data,
  function($a, $b) {
    //2つの値が同じで順番を変えたくないときは０を返しなさいという仕様
    //$a,$bに入ってくるのは配列の要素なので['score']を入れてあげる
if($a['score'] === $b['score']) { 
  return 0;
}
//1が後-1が前に来る？
return $a['score'] > $b['score'] ? 1 : -1;
  }
);

print_r($data);