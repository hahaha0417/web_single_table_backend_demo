#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
cd "$BASEDIR"/../
# 發佈
composer dump-autoload
# pwd
# read