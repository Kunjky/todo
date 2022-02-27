## Installation
Development environment requirements :
-  PHP >= 7.4
-  Mysql >= 5.7
-  Composer >= 2.2.7

Setting up your development environment on your local machine :
```bash
$ git clone https://github.com/Kunjky/todolist.git
$ cd todolist
```

Modify database connection in `config.php`

Import `migration.sql`

```bash
$ mysql -uroot < migration.sql
```
Install packages
```bash
$ composer install
```
Start local server
```bash
$ php -S localhost:8000
```

Now you can access the application via [http://localhost:8000](http://localhost:8000)


## Useful commands
Checking coding style
```bash
$ ./vendor/bin/phpcs --standard=phpcs.xml
```

Running unit test
```bash
$ ./vendor/bin/phpunit
```
