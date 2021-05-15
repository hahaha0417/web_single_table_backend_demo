#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

cd "$BASEDIR"/../..
[ ! -d "libraries" ] && mkdir "libraries"

# 更新
# -- hahalib
cd "$BASEDIR"/../../libraries/hahalib
git pull


# pwd
# read