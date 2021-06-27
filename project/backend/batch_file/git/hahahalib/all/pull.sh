#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

# 更新
# -- hahahalib
cd "$BASEDIR"/../../../../libraries/hahahalib
git pull

# -- hahalib
cd "$BASEDIR"/../../../../libraries/hahalib
git pull

# -- s_ulib
cd "$BASEDIR"/../../../../libraries/s_ulib
git pull

# -- g_plib
cd "$BASEDIR"/../../../../libraries/g_plib
git pull
# 金融 X 法律 包，hahaha範圍內不允許直接使用此包在專案內，需另外隔開，避免 金融 & 法律 問題影響
# -- _f_lib
cd "$BASEDIR"/../../../../libraries/_f_lib
git pull


# pwd
# read