DOCKER_COMPOSE  ?= docker compose
DOCKER_COMPOSE_EXEC  ?= $(DOCKER_COMPOSE) exec -T --user www-data app-main

.PHONY: run
run:
	$(DOCKER_COMPOSE) -f docker-compose.yml up -d && cd src/ && php artisan serve

.PHONY: run-rebuild
run-rebuild:
	$(DOCKER_COMPOSE) -f docker-compose.yml up --build -d

.PHONY: stop
stop:
	$(DOCKER_COMPOSE) -f docker-compose.yml stop

.PHONY: clean
clean:
	$(DOCKER_COMPOSE) -f docker-compose.yml down -v

.PHONY: ssh
ssh:
	$(DOCKER_COMPOSE) exec --user www-data app-main /bin/bash

.PHONY: prepare
prepare:
	cp -n .env.example .env
	$(DOCKER_COMPOSE) -f docker-compose.yml up -d --build
	$(DOCKER_COMPOSE_EXEC) cp -n .env.example .env

.PHONY: seed
seed:
	cd src && php artisan october:migrate

