#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
npm update
# -- 附屬專案
cd "$BASEDIR"/../project/fast_api
npm update
# -- 前台
cd "$BASEDIR"/../project/front
npm update
# -- 後台
cd "$BASEDIR"/../project/backend
npm update
# -- api
cd "$BASEDIR"/../project/api
npm update

# pwd
# read