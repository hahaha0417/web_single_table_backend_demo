#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

cd "$BASEDIR"/../..

[ ! -d "libraries" ] && mkdir "libraries"

# 更新 
# -- g_plib 
cd "$BASEDIR"/../../libraries
git clone "https://github.com/hahaha0417/php_hahahalib.git" "hahahalib"


# pwd
# read