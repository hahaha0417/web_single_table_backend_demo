#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
composer install
# -- 附屬專案
cd "$BASEDIR"/../project/hahaha
composer install
# -- 前台
cd "$BASEDIR"/../project/front
composer install
# -- 後台
cd "$BASEDIR"/../project/backend
composer install
# -- api
cd "$BASEDIR"/../project/api
composer install

# pwd
# read