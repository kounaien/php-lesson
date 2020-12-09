<?php
  declare(strict_types=1);
  $sum = function ($a, $b, $c) ///無名関数　関数自体を別の引数に渡すことも可能
  {
    $total =  $a + $b + $c;

    // if ($total < 0) {
    //   return 0;

    // } else {
    //   return $total;
    // }
    return $total < 0 ? 0 : $total; //条件演算子　true : false
  };

  echo $sum(100, 200, 300) . PHP_EOL;
  echo $sum(-1000, 200, 300) . PHP_EOL;

  function showInfo(string $name, int $score): void 
  //決まった方を入れてほしいときは型を決めてあげる
  // voidは返り値の型付け返り値がない場合はvoidという特殊なキーワードを使う
  //しかしこのままだとphpは可能な限り型を近い形に変えようとするため
  //string型の６は数値として解釈されるため
  // declare(strict_types=1)
  {
    echo $name . ':' . $score . PHP_EOL;
  }

 echo showInfo('taguchi', 6);
//  echo showInfo('taguchi', '6');


//: stringだとnullが返り血のときエラーになるのでPHPでは方の前に
//？マークをつけると、nulllかその型かといういみになる
function getAward(?int $score): ?string
{
  return $score >= 100 ? 'GOLD Medal' : null;
}

echo getAward(150) . PHP_EOL;
echo getAward(90) . PHP_EOL;



$scores = [
  'first' => 90, 'second' => 30, 'third' => 100
];

echo $scores['first'].PHP_EOL;


var_dump($scores) . PHP_EOL;
print_r($scores) . PHP_EOL;


// $scoesを代入する変数名は何でも良いkeyも矢印さえあればキーだとわかるので変数名は何でも良い
foreach ($scores as $value) {
  echo $value . PHP_EOL;
};

foreach ($scores as $key => $value) {
  echo $key . '-' . $value . PHP_EOL;
};

$moreScores = [44, 72, 'prefect', [30, 40]
];
//$scores = [90, 20,, $moreScores]だと配列の中に更に配列が入る
//PHP7.5i以上で実行可能下記で配列の中に値をきれいに代入できる
//また配列には様々な値が入る数値だけ入っているものに文字列や配列を入れることも可能
///配列の中の配列んにアクセスするにはmoreScores[3][0]


// $arr = [
//   90,
//   40,
//   100,
//   ...$moreScores
// ];


print_r($moreScores);
echo $moreScores[3][0] . PHP_EOL;//3は配列が格納されているキー