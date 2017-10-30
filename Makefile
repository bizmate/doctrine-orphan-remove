SHELL := /usr/bin/env bash
up:
	export UID && docker-compose up -d

down:
	docker-compose down -v

bash:
	export UID && docker-compose run  php bash

tests:
	docker-compose run --rm php bash -c "vendor/bin/behat"


