#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

cd "$BASEDIR"/../..
[ ! -d "libraries" ] && mkdir "libraries"

# 更新
# -- s_ulib
cd "$BASEDIR"/../../libraries
git clone "https://github.com/hahaha0417/php_s_ulib.git" "s_ulib"


# pwd
# read