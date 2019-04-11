To work with this repository, do the following:

1) git clone <i>URL</i>
2) composer install
3) npm install
4) create a database and name it: mywebsite2 (if you name it differently, make changes in .env file)
5) import the 'mywebsite2.sql' in that database
6) php artisan storage:link

7) If you want to upload it to the hosting server: npm run production
8) Add the following in the 'boot' function in 'AppServiceProvider.php'

    //make the change according to your file structure
    $this->app->bind('path.public', function() {
        return base_path().'/../public_html';
    });
