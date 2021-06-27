#!/usr/bin/sh

BASEDIR=$(dirname "$0")
# 切換目錄
cd "$BASEDIR"/../../../../frontend/

# 更新
composer dump-autoload

# 切換目錄
cd "$BASEDIR"/../../../../backend/

# 更新
composer dump-autoload

# 切換目錄
cd "$BASEDIR"/../../../../api/

# 更新
composer dump-autoload

# 切換目錄
cd "$BASEDIR"/../../../../migrate/

# 更新
composer dump-autoload

# pwd
# read



