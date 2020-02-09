<?php

/*
composer require paquettg/php-html-parser
https://github.com/paquettg/php-html-parser

照jQuery方式parser，還不錯用，沒什麼好打包的

use PHPHtmlParser\Dom;

$dom = new Dom;
$dom->load('<div class="all"><p>Hey bro, <a href="google.com">click here</a><br /> :)</p></div>');
$a = $dom->find('a')[0];
echo $a->text; // "click here"
*/