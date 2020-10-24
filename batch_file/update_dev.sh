#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
composer update
# -- 附屬專案
cd "$BASEDIR"/../project/fast_api
composer update
# -- 前台
cd "$BASEDIR"/../project/front
composer update
# -- 後台
cd "$BASEDIR"/../project/backend
composer update
# -- api
cd "$BASEDIR"/../project/api
composer update

# pwd
# read