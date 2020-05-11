# Инициализация (очистка, скачивание, сборка, поднятие)
init: docker-down-clear docker-pull docker-build docker-up composer-install
# Поднять
up: docker-up
# Остановить
down: docker-down
# Перезапустить
restart :
	docker-compose restart

### Контейнеры и образы docker
# Скачать все образы проекта
docker-pull:
	docker-compose pull

# Собрать все образы проекта
docker-build:
	docker-compose build

# Скачать обновления образов и собрать все образы проекта
docker-build-pull:
	docker-compose build --pull

# Поднять все контейнеры
docker-up:
	docker-compose up -d

# Остановить все контейнеры
docker-down:
	docker-compose down --remove-orphans

# Остановка удаление томов у контейнеров
docker-down-clear:
	docker-compose down -v --remove-orphans

### Composer
# Установка пакетов
composer-install:
	docker-compose run --rm php-cli composer install

# Обновить автозагрузчик
composer-dump-autoload:
	docker-compose run --rm php-cli composer dump-autoload


### Миграции
# Создать миграцию + права доступа
create-migration: add-migration change-permitions

# Создать миграцию
add-migration:
	docker-compose run --rm php-cli composer phinx create $(name)

# Поменять права на файлы
change-permitions:
	docker-compose run --rm php-cli chmod -R 777 db/mariadb/migrations/

# Запуск миграций
run-migrations:
	docker-compose run --rm php-cli composer phinx migrate

# Откат миграции
rollback-migration:
	docker-compose run --rm php-cli composer phinx rollback