# Инициализация (очистка, скачивание, сборка, поднятие)
init: docker-down-clear docker-pull docker-build docker-up composer-install
# Поднять
up: docker-up
# Остановить
down: docker-down
# Перезапустить
restart :
	docker-compose restart
# Проверки
lint: phplint phpcs
analyze: psalm

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
create-migration: add-migration change-permitions-migrations

# Создать миграцию
add-migration:
	docker-compose run --rm php-cli composer phinx create $(name)

# Поменять права на файлы
change-permitions-migrations:
	docker-compose run --rm php-cli chmod -R 777 db/mariadb/migrations/ db/mariadb/seeds/

# Запуск миграций
run-migrations:
	docker-compose run --rm php-cli composer phinx migrate

# Откат миграции
rollback-migration:
	docker-compose run --rm php-cli composer phinx rollback

### Донные
# Создание файла с данными
create-data:
	docker-compose run --rm php-cli composer phinx -- seed:create $(name)
# Добавление данных в базу данных
added-data:
	docker-compose run --rm php-cli composer phinx -- seed:run -s $(name)

### Проверки
# Линтер
phplint:
	docker-compose run --rm php-cli composer phplint
# Соотвествие стандартам
phpcs:
	docker-compose run --rm php-cli composer cs-check
# Исправление кода к соответствию со стандартами
phpcsfix:
	docker-compose run --rm php-cli composer cs-fixed
# Синтаксический анализ кода
psalm:
	docker-compose run --rm php-cli composer psalm