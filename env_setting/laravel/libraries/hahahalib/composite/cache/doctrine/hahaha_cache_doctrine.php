<?php

/*
// --------------------------------------------------------------------------
注意
// --------------------------------------------------------------------------
沒 Opcache 小慢，請不要為了省力，摻入主要架構
// --------------------------------------------------------------------------
*/

/*
// --------------------------------------------------------------------------
{
    "require": {
        "doctrine/orm": "^2.6.2",
        "symfony/yaml": "2.*"
    },
    "autoload": {
        "psr-0": {"": "src/"}
    }
}
composer install
https://github.com/doctrine/cache
https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/caching.html
Licene MIT
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
*/

/*
Copyright (c) 2006-2015 Doctrine Project

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
/*

{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}
*/

namespace hahahalib\cache;



/*
我不是要Wrapper他，只是用來快速初始化
要wrapper成模組，請另外做，不過我覺得意義不大，它本身就是做好的模組了
*/
class hahaha_cache_doctrine
{
    use \hahahalib\hahaha_instance_trait;
    
    public $Redis_ = NULL;

    public $Memcached_ = NULL;

    function __construct()
    {
       
    }

    public function Initial()
    {
        return $this;   
    }

    /*
    大概這樣用，
    因為不需要Set，所以直接取Redis
    
    */
    public function Redis($redis = NULL)
    {
        if(empty($this->Redis_))
        {
            if(empty($redis))
            {
                $redis_ = new \Redis();
                $redis_->connect('redis_host', 6379);

                $this->Redis_ = new \Doctrine\Common\Cache\RedisCache();
                $this->Redis_->setRedis($redis_);
            }
            else
            {
                $this->Redis_ = new \Doctrine\Common\Cache\RedisCache();
                $this->Redis_->setRedis($redis);
            }
        }
        
        return $this->Redis_;   
    }

    public function Memcached($memcached)
    {
        if(empty($this->Memcached_))
        {
            if(empty($redis))
            {
                $memcached_ = new \Memcached();
                $memcached_->addServer('memcache_host', 11211);
    
                $this->Memcached_ = new \Doctrine\Common\Cache\MemcachedCache();
                $this->Memcached_->setMemcached($memcached_);
            }
            else
            {
                $this->Memcached_ = new \Doctrine\Common\Cache\MemcachedCache();
                $this->Memcached_->setMemcached($memcached);
            }

        }
        
        return $this->Memcached_;   
    }
	
}