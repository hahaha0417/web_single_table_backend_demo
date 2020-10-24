#!/usr/bin/sh

# https://blog.csdn.net/kangkanglou/article/details/81943986
BASEDIR=$(cd `dirname $0`;pwd)
# 切換目錄
# cd "$BASEDIR"/../../

# 更新
# -- 主專案
cd "$BASEDIR"/project/
./hahaha.sh
# -- 附屬專案
cd "$BASEDIR"/project/project
./fast_api.sh
# -- 前台
cd "$BASEDIR"/project/project
./front.sh
# -- 後台
cd "$BASEDIR"/project/project
./backend.sh
# -- api
cd "$BASEDIR"/project/project
./api.sh

# pwd
# read
