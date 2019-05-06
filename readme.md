<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## About the project
Its a website made using Laravel. It also consist the Content Management System (CMS).

[Live Preview](http://pjmessi.visioninteriornepal.com/)
for admin panel: username: pjmessi10
                 password: myfamily10

<h4>To work with this repository, do the following:</h4>
<ol>
    <li><b>git clone <i>URL</i></b></li>
    <li><b>composer install</b></li>
    <li><b>npm install</b></li>
    <li>create a database and name it 'mywebsite2' (if you choose a different name, make changes in the '.env' file accordingly)</li>
    <li>import the 'mywebsite2.sql' in that database</li>
    <li><b>php artisan storage:link</b></li>
    <li>If you want to upload it to the hosting server: <b>npm run production</b></li>
    <li>Add the following in the 'boot' function in 'AppServiceProvider.php'</li>   
</ol>

        
        $this->app->bind('path.public', function() {
            return base_path().'/../public_html';
        });
