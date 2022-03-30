up:
	docker-compose up
upd:
	docker-compose up -d
down:
	docker-compose down
downs:
	docker-compose down --remove-orphans
build:
	docker-compose up --build
buildd:
	docker exec -it backend /bin/bash ./start.sh
sh:
	docker exec -it backend /bin/bash
install:
	composer install
dum:
	composer dump-autoload
reset:
	docker-compose down --remove-orphans && docker system prune -a -f && docker-compose up --build
