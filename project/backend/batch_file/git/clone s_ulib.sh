#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

# 更新
# -- s_ulib
mkdir -p "$BASEDIR"/../../libraries
cd "$BASEDIR"/../../libraries/
git clone "https://github.com/hahaha0417/php_s_ulib.git" "s_ulib"


# pwd
# read