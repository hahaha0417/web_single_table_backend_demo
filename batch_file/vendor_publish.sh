#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
php artisan vendor:publish --tag="config"
php artisan vendor:publish --tag="cors"
# -- 附屬專案
cd "$BASEDIR"/../project/hahaha
# php artisan vendor:publish --tag="config"
# php artisan vendor:publish --tag="cors"
# -- 前台
cd "$BASEDIR"/../project/front
php artisan vendor:publish --tag="config"
php artisan vendor:publish --tag="cors"
# -- 後台
cd "$BASEDIR"/../project/backend
php artisan vendor:publish --tag="config"
php artisan vendor:publish --tag="cors"
# -- api
cd "$BASEDIR"/../project/api
php artisan vendor:publish --tag="config"
php artisan vendor:publish --tag="cors"

# pwd
 read