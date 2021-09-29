## About PezeshaCSV

This is a laravel built CSV uploader that inserts into the Database.

##Setting up this repository

git clone https://github.com/Pwawazi/pezeshaCSV.git \
cd pezeshaCSV \
composer install \
cp .env.example .env \
php artisan key:generate\
php artisan cache:clear && php artisan config:clear \
php artisan serve


##Unforseen errors during launch may include:\
Ensure the php.ini on the host you serve from has the rightly configured file upload limit since the provided CSV is large. Also ensure that the .env has the correct values to your database and table.