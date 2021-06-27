#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
cd "$BASEDIR"/../../../../frontend/

# 更新
composer update

# 切換目錄
cd "$BASEDIR"/../../../../backend/

# 更新
composer update

# 切換目錄
cd "$BASEDIR"/../../../../api/

# 更新
composer update

# 切換目錄
cd "$BASEDIR"/../../../../migrate/

# 更新
composer update

# pwd
# read


