## Laravel 5.7 Blog application with CMS

Setup:

**1. Clone the repository**

 ```bash
git clone https://github.com/Bellov/blog
```

**2. Configure PostgreSQL database**

* Create a database named blog_cms.

Command line:

```bash
psql postgres
```

```bash
CREATE DATABASE blog_cms
```

```bash
GRANT ALL PRIVILEGES ON DATABASE blog_cms TO your 'user name';
```

```bash
\q
```

**3.  Run the application**

#### Mac Os, Ubuntu and windows users continue here:

* Open the console and cd your project root directory

```bash
composer install
```

```bash
php artisan key:generate
```

* Then open `database.php` and `.env` and change username and password  as per
PGSQL installation.

```bash
DB_CONNECTION=pgsql
DB_HOST=hostname
DB_PORT=5432
DB_DATABASE=Your database name
DB_USERNAME=Your database username
DB_PASSWORD=Your database password
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

```bash
php artisan serve
```

## Tools:

[Mailchimp](https://github.com/spatie/laravel-newsletter)

[Disqus](https://disqus.com/)


### You can now access the project at localhost:8000

[Home Page](https://localhost:8000)

[Login to Blog CMS](https://localhost:8000/login)

___
## Admin login credentials ##

| email | password |
|-------- |---------
| admin@gmail.com | password |
___


! [Screenshots] (<a href="https://postimg.cc/5jzSNxzN" target="_blank"><img src="https://i.postimg.cc/5977gyNv/Screenshot-2018-10-21-at-19-00-03.png" alt="Screenshot-2018-10-21-at-19-00-03"/></a> <a href="https://postimg.cc/t1fFpfCx" target="_blank"><img src="https://i.postimg.cc/B6Zpc9rM/Screenshot-2018-10-21-at-19-00-25.png" alt="Screenshot-2018-10-21-at-19-00-25"/></a><br/><br/>
<a href="https://postimg.cc/kRP8tbSM" target="_blank"><img src="https://i.postimg.cc/gjnKQykh/Screenshot-2018-10-21-at-19-00-46.png" alt="Screenshot-2018-10-21-at-19-00-46"/></a> <a href="https://postimg.cc/hXtmxgXm" target="_blank"><img src="https://i.postimg.cc/bwQ97w8m/Screenshot-2018-10-21-at-19-02-48.png" alt="Screenshot-2018-10-21-at-19-02-48"/></a><br/><br/>
<a href="https://postimg.cc/4Y29QMcS" target="_blank"><img src="https://i.postimg.cc/pdRJRMLR/Screenshot-2018-10-21-at-19-03-29.png" alt="Screenshot-2018-10-21-at-19-03-29"/></a> <a href="https://postimg.cc/McXykxxw" target="_blank"><img src="https://i.postimg.cc/7LnX2YW5/Screenshot-2018-10-21-at-19-03-44.png" alt="Screenshot-2018-10-21-at-19-03-44"/></a><br/><br/>
<a href="https://postimg.cc/SYL9LxL6" target="_blank"><img src="https://i.postimg.cc/wMZkpt7G/Screenshot-2018-10-21-at-19-04-01.png" alt="Screenshot-2018-10-21-at-19-04-01"/></a> <a href="https://postimg.cc/GHrGLvrq" target="_blank"><img src="https://i.postimg.cc/Wbqn77yL/Screenshot-2018-10-21-at-19-05-27.png" alt="Screenshot-2018-10-21-at-19-05-27"/></a><br/><br/>
)
