<?php

// use Fuji\MyphpApp as Myapp;

// spl_autoload_register(function ($class) {
  // require($class . '.php');
  // require('Post' . '.php');
// });
// require('Post.php');
// include('Post.php');
// require_once('Post.php');

require ('Post.php');
try {


  $posts[0] = new Post('he');
  $posts[1] = new Post('hello again');

// $posts[0] = new Myapp\Post('helllo');
// $posts[0] = new Fuji\MyphpApp\Post('hello');
// $posts[1] = new Myapp\Post('in');
// $posts[1] = new Myapp\Post('hello again');

foreach ($posts as $post) {
  echo $post->show();
}
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
