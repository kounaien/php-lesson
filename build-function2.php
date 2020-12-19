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
echo $scores[$picked[0]] . PHP_EOL; //帰ってくるのは$scoresのキーの方なので変数に代入した添字で出す
echo $scores[$picked[1]] . PHP_EOL; 