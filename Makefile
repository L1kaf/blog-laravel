start:
	php artisan serve

install:
	composer install

validate:
	composer validate

setup:
	cp -n .env.example .env || true
	composer install
	php artisan key:generate
	php artisan migrate
	npm install && npm run build

lint:
	composer exec --verbose phpcs -- --standard=PSR12 app routes tests

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 app routes tests

test:
	php artisan test
