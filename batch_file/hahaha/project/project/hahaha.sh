#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
# cd "$BASEDIR"/../../../../project

# 更新
# -- hahaha
cd "$BASEDIR"/../../../../project
git clone https://github.com/hahaha0417/php_hahaha_framework.git hahaha
# 刪除多餘檔案
rm -R ./vendor
rm composer.json
rm composer.lock
#
cd hahaha
cp -Rf ./template/* ./
composer update
# 初始化
cd "$BASEDIR"/../../../../
cp -Rf ./env_setting/hahaha/* ./project/hahaha
# ./resources/public要的自己複製，因為裡面包含前台 & 後台，可能有些人只要一種

# ----------------------------------- 
# Third Party
# ----------------------------------- 
# Guzzle Http
# composer require guzzlehttp/guzzle
# Carbon
# composer require nesbot/carbon
# Predis
# composer require predis/predis
# redlock(Redis Lock)
# composer require signe/redlock-php
# mongodb
# composer require mongodb/mongodb
# 綜合鎖
# composer require "malkusch/lock"

# ----------------------------------- 
# Third Party Option
# ----------------------------------- 
# Botman
# composer require botman/botman
# Line Bot SDK
# composer require linecorp/line-bot-sdk
# Google SDK
# composer require google/apiclient:"^2.0"
# AWS SDK
# composer require aws/aws-sdk-php
# Azure SDK
# composer require microsoft/windowsazure
# Elasticsearch(秀圖表用，有要秀圖表再用這個)，需搭配elasticsearch & kibana，其實可以將資料餵給excel或其他就好，那圖表還比較豐富
# composer require elasticsearch/elasticsearch

# ----------------------------------- 
# 其他
# ----------------------------------- 
# PDF & Excel Composer都有套件，要請自己去composer找
# https://packagist.org/explore/



# pwd
# read
