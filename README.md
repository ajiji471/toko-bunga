
# install / update node js
    npm install
# install / update composer
    composer install
# make model
    php artisan make:model product -m
# migrate
    php artisan migrate
# make controller porduct
    php artisan make:controller ProductController --resource
# running laravel
    php artisan serve
# running tailwind
    npm run dev
# create fake user
    php artisan make:seeder UserSeeder
# running seeder
    php artisan db:seed --class=UserSeeder
# add tool pdf
    composer require barryvdh/laravel-dompdf