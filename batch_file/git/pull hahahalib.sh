#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

cd "$BASEDIR"/../..
[ ! -d "libraries" ] && mkdir "libraries"

# 更新
# -- hahahalib
cd "$BASEDIR"/../../libraries/hahahalib
git pull


# pwd
# read