#!/usr/bin/sh

BASEDIR=$(dirname "$0")

# 安裝plugin
echo " ------------------------- "
echo " 安裝plugin 開始"
echo " ------------------------- "
npm install
echo " ------------------------- "
echo " 安裝plugin 結束"
echo " ------------------------- "

# plugin處理
echo " ------------------------- "
echo " plugin處理 開始"
echo " ------------------------- "
php deal.php
echo ""
echo " ------------------------- "
echo " plugin處理 結束"
echo " ------------------------- "


# pwd
# read