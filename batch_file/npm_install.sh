#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../

# 更新
# -- 主專案
cd "$BASEDIR"/../hahaha
npm install
# -- 附屬專案
cd "$BASEDIR"/../project/fast_api
npm install
# -- 前台
cd "$BASEDIR"/../project/front
npm install
# -- 後台
cd "$BASEDIR"/../project/backend
npm install
# -- api
cd "$BASEDIR"/../project/api
npm install

# pwd
# read