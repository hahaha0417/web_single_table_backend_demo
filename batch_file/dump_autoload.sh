#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
composer dump-autoload
# -- 附屬專案
cd "$BASEDIR"/../project/hahaha
composer dump-autoload
# -- 前台
cd "$BASEDIR"/../project/front
composer dump-autoload
# -- 後台
cd "$BASEDIR"/../project/backend
composer dump-autoload
# -- api
cd "$BASEDIR"/../project/api
composer dump-autoload

# pwd
# read