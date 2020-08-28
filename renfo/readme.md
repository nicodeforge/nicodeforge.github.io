# Docker Environment 

docker run -tid -p 3360:3306 --name mysql56 -e MYSQL_ROOT_PASSWORD=root -v ~/Dev/nicodeforge.github.io/renfo/local/mysql56/data/mysql:/var/lib/mysql  -d mysql:5.6

docker run -tid --name project-renfo --link mysql56:mysql -v $(pwd):/var/www/html -p 8888:80 richarvey/nginx-php-fpm:latest

#Database

- renforcement
	- 