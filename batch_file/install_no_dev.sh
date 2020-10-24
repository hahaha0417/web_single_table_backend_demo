#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
composer install --no-dev
# -- 附屬專案
cd "$BASEDIR"/../project/fast_api
composer install --no-dev
# -- 前台
cd "$BASEDIR"/../project/front
composer install --no-dev
# -- 後台
cd "$BASEDIR"/../project/backend
composer install --no-dev
# -- api
cd "$BASEDIR"/../project/api
composer install --no-dev

# pwd
# read