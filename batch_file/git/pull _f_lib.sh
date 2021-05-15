#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

cd "$BASEDIR"/../..
[ ! -d "libraries" ] && mkdir "libraries"

# 更新
# -- g_plib
cd "$BASEDIR"/../../libraries/_f_lib
git pull


# pwd
# read