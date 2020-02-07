#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
composer update --no-dev
# -- 附屬專案
cd "$BASEDIR"/../project/hahaha
composer update --no-dev
# -- 前台
cd "$BASEDIR"/../project/front
composer update --no-dev
# -- 後台
cd "$BASEDIR"/../project/backend
composer update --no-dev
# -- api
cd "$BASEDIR"/../project/api
composer update --no-dev

# pwd
# read