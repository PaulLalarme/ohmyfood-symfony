
logs:
	docker compose logs -f
pull:
	docker pull registry.affineurs.pro/affineurs/php:8.1-apache-dev
up:
	docker compose up -d
down:
	docker compose down
bash:
	docker compose exec app bash

install: pull db-create up

reset-all: db-drop down install ## Reset app

db-create: ## Create database
	docker exec -it mariadb_picasso mysql -uroot -proot -e "create database if not exists tutosymfo;"

db-drop: ## Remove database
	docker exec -it mariadb_picasso mysql -uroot -proot -e "drop database if exists tutosymfo;"

db-save: ## Save DB data & structure
	docker exec -it mariadb_picasso mysqldump -uroot -proot tutosymfo | gzip > db-tutosymfo.sql.gz

db-restore: ## Restore DB data & structure
	gunzip -c db-tutosymfo.sql.gz | docker exec -i mariadb_picasso mysql -uroot -proot tutosymfo

db-reset: db-drop db-create ## Reset DB
