#!/usr/bin/sh

BASEDIR=$(dirname "$0")

# 開啟資料夾
explorer "$BASEDIR\..\..\assets\plugin"
cd "$BASEDIR\..\..\assets\plugin"
./"plugin install.sh"


# pwd
read