#!/usr/bin/sh

BASEDIR=$(dirname "$0")

# 開啟資料夾
explorer "$BASEDIR\..\..\assets\batch_file\git"
cd "$BASEDIR\..\..\assets\batch_file\git"
./"pull common.sh"


# pwd
read