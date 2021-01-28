<?php

// namespace Fuji\MyphpApp;

class Post
{
  private $text;

  function __construct($text)
  {
    if (strlen($text) <= 3)
    {
      // echo 'Text too short! . PHP_EOl';
      // exit;

      throw new Exception('Text too short!');
    }
    $this->text = $text;
  }

  function show()
  {
    printf("%s" . PHP_EOL, $this->text);
  }
}