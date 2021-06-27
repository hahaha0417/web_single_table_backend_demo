#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/libraries/

# 更新
# -- hahahalib
mkdir -p "$BASEDIR"/../../../../libraries
cd "$BASEDIR"/../../../../libraries/
git clone "https://github.com/hahaha0417/php_hahahalib.git" "hahahalib"

# -- hahalib
mkdir -p "$BASEDIR"/../../../../libraries
cd "$BASEDIR"/../../../../libraries/
git clone "https://github.com/hahaha0417/php_hahalib.git" "hahalib"

# -- s_ulibs_ulib
mkdir -p "$BASEDIR"/../../../../libraries
cd "$BASEDIR"/../../../../libraries/
git clone "https://github.com/hahaha0417/php_s_ulib.git" "s_ulib"

# -- g_plib
mkdir -p "$BASEDIR"/../../../../libraries
cd "$BASEDIR"/../../../../libraries/
git clone "https://github.com/hahaha0417/php_g_plib.git" "g_plib"

# 金融 X 法律 包，hahaha範圍內不允許直接使用此包在專案內，需另外隔開，避免 金融 & 法律 問題影響
# -- _f_lib
mkdir -p "$BASEDIR"/../../../../libraries
cd "$BASEDIR"/../../../../libraries/
git clone "https://github.com/hahaha0417/php__f_lib.git" "_f_lib"



# pwd
# read