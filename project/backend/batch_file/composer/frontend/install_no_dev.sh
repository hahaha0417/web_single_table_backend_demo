#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
cd "$BASEDIR"/../../../../frontend/

# 更新
composer install --no-dev

# pwd
# read
