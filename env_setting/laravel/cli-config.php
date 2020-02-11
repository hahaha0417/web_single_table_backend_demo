<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// 不要用 $argv，那似乎是複製的版本，砍掉沒有用
foreach($_SERVER['argv'] as $key => &$arg)
{
    $token_ = explode('=', $arg);
    if(count($token_) == 2)
    {
        if($token_[0] == '---connection')
        {
            $connection_ = $token_[1];
            // 避免doctrine吃錯參數，因為是reference $arg_->Arg，所以可以這樣unset掉Argv的Array Item
            unset($_SERVER['argv'][$key]);
        }
    }    
}

// http://mitchmckenna.com/post/15205/doctrine-cli-configphp-for-laravel-5
// replace with file to your own project bootstrap
/** @var Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/bootstrap/app.php';

/** @var Illuminate\Contracts\Console\Kernel $kernel */
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

$app->boot();

if(empty($connection_))
{
    echo '使用連線 : default';
    $entityManager = $app[EntityManager::class];
}
else
{
    echo '使用連線 : ' . $connection_;
    // connection - config\doctrine.php連線名
    $entityManager = Registry::getManager($connection_);
}

return ConsoleRunner::createHelperSet($entityManager);