# Инициализация (очитска, скачивание, сборка, поднятие)
init: docker-down-clear docker-pull docker-build docker-up
# Поднять
up: docker-up
# Остановить
down: docker-down

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