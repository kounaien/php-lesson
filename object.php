<?php
//弱い片付けなのでストリングの型付けにも数値が文字列に変換され入ってしまうそこで強い型付け
//ただこれをしても文字列の後にドットをつけて数値をいれても入ってしまった
declare(strict_types=1);

interface LikeInterface
{
  public function like();
}

//抽象クラス
//それじたいからはインスタンスを作製できない、継承を前提としたクラス
//子クラスのメソッドがなくても親クラスにあれば動くただ、ここで、show()メソッドは子クラスの方でちゃんと独自の定義をしてほしかったとするそれに使える抽象クラス
//親クラスと子クラスのほうでこの抽象クラスを継承させれば子クラスの方でメソッドを強制する
abstract class BasePost
{
  protected string $text;
  // protected int $likes = 0;
  protected static $count;

public function __construct(string $text)
{
  $this->text = $text;
  self::$count++;
}


  //このメソッドは小クラスの方で必ず定義してねというルールを作るにはabstractキーワードをつけたメソッドを書く
  //ただ定義自体は子クラスのほうでかくので中身はなし
  abstract public function show();

  // public function like()
  // {
  //   $this->likes++;

  //   if ($this->likes > 100) {
  //     $this->likes = 100;
  //   }
  // }
}

//クラスを作ったがデータ型の構造でしかないクラスで何かを作る
class Post extends BasePost implements LikeInterface
{

  private $likes = 0;

  public function like()
  {
    $this->likes++;
  }

  //プロパティ（クラスの中で定義した変数）
  //アクセス修飾子をprivateに変更するとクラス外からはアクセスできなくなる
  //アクセス修飾子をつけていきこのクラスに対して何ができ何ができないかを明確にする表現することをカプセル化
  // protected string $text;
  // private int $likes = 0;

  //プロパティやメソッドはインスタンスに紐付いたものでしたが、実はクラス自体に紐付いたプロパティやメソッドも設定する事ができる
  // private static $count = 0;
  //クラスに基づいた定数　オブジェクト定数 定数は値が変わらないのでパブリックでクラス外からアクセス可能
  // private const VERSION = 0.1;
  public const VERSION = 0.1;


  //newしたときに実行されるコンストラクタという特殊なメソッドで処理
  // public function __construct($textFromNew, $likesFromNew)
  // 0でデフォルトで渡しているため
  //public function __construct($text, $likesのライクスは省略デフォ値)
  // public function __construct(string $text)
  // {
  //   $this->text = $text;
    //クラスプロパティstaticをつけた変数には以下のようにアクセスするダラーマーク必要
    // self::$count++;
    // $this->likes = $likes;
    // $this->text = $textFromNew;
    // $this->likes = $likesFromNew;
  // }
  //メソッド（クラスの中で定義した関数表示していくのはクラスが持つ変数の中身なので引数はなし
  //オーバライドさせたくないときはアクセス修飾子の前にfinalキーワード
  //final public function show()
  public function show()
  {
    //クラスのなかでこちらの変数にアクセスするには$thisというキーワードと、アロー演算子、変数の前のダラーマーク不要
    printf('%s (%d)' . PHP_EOL, $this->text, $this->likes);
  }

  //クラスメソッド
  public static function showInfo()
  {
    printf('Count: %d' . PHP_EOL, self::$count);
    printf('Version: %.1f' . PHP_EOL, self::VERSION);
  }

  //プログラムはメソッドを介して操作することで、安全なプログラムがかける様になる
  // public function like()
  // {
  //   $this->likes++;

  //   if ($this->likes > 100) {
  //     $this->likes = 100;
  //   }
  // }
}

//ポストクラスのプロパティやメソッドを継承
class SponsoredPost extends BasePost
{
  private $sponsor;

  //親クラスにあるtextプロパティにセットするために親クラスのコンストラクタを使う
  //使い方はparent::でコンストラクタの名前
  public function __construct($text, $sponsor)
  {
    parent::__construct($text);
    $this->sponsor = $sponsor;
  }

  public function showSponsor()
  {
    printf('%s' . PHP_EOL, $this->sponsor);
  }

  //親クラスと同盟のメソッドを定義することができる
  //メソッドのオーバライド
  //親クラスのプロパティにアクセスする際にはアクセス修飾子を変更する必要あり
  //ただパブリックだとどこでもアクセスできるためprotectedにして親クラスと子クラスのみにする
  public function show()
  {
    printf('%s by %s'. PHP_EOL, $this->text, $this->sponsor);
  }
}

class PremiumPost extends BasePost implements LikeInterface
{
  private $likes = 0;
  private $price;

  public function like()
  {
    $this->likes++;
  }

  public function __construct($text, $price)
  {
    parent::__construct($text);
    $this->price = $price;
  }

  public function show()
  {
    printf('%s (%d) [%d JPY]' . PHP_EOL, $this->text, $this->likes, $this->price);
  }
}

$posts = [];
// $posts[0] = ['text' => 'hello', 'like' => 0];

//0で初期化してるため
$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');
$posts[2] = new SponsoredPost('hello sponsor', 'dotinstall');
$posts[3] = new PremiumPost('hello', 350);
// $posts[0] = new Post('hello', 0);
// $posts[0]->text = 'hello';　上記の短文でまとめるコンストラクタで処理
// $posts[0]->likes = 0;

$posts[0]->like();
$posts[3]->like();

// $posts[1] = new Post('hello again', 0);
// $posts[1]->text = 'hello again';
// $posts[1]->likes = 0;

// $posts[1] = ['text' => 'hello  again', 'like' => 0];

// print_r($posts);
// var_dump($posts);

// function show($posts)
// {
//   printf('%s (%d)'. PHP_EOL, $posts['text'], $posts['like']);
// }

// show($posts[0]);
// show($posts[1]);

//privateプロパティにはアクセスできない
// $posts[0]->likes++;
// $posts[0]->likes = -100;

// var_dump($posts[0]);

function processLikeable(LikeInterface $likeable)
{
  $likeable->like();
}

echo('-----------' . PHP_EOL);
processLikeable($posts[0]);
processLikeable($posts[3]);

//引数の型付けにはクラス名も使える
//SponsoredPostクラスもポスト型として使える継承してるので上でnewして下記で引数の型付けでエラーが起こらない
function processPost(BasePost $post)
{
  $post->show();
}

foreach ($posts as $post) {
  processPost($post);
}

$posts[0]->like();
$posts[0]->show();
$posts[1]->show();
Post::showInfo();
echo Post::VERSION . PHP_EOL;
// $posts[2]->like();
$posts[2]->show();

