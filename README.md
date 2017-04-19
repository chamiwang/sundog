# sundog
fast php frame

## install
composer create-project unstablesouls/sundog --prefer-dist
## command
generate models  更新数据模型（请先清空需要更新的数据模型类）
php vendor/doctrine/orm/bin/doctrine orm:generate-entities src
update database 强制更新数据库
php vendor/doctrine/orm/bin/doctrine orm:schema-tool:update --force 
