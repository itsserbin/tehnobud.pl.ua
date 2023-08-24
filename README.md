````
docker-compose up -d
docker-compose exec app bash
composer i
composer run post-root-package-install
composer run post-create-project-cmd
php artisan storage:link
php artisan init
````