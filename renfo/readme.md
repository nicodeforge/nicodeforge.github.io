# Docker Environment 

docker run -tid -p 3360:3306 --name mysql56 --restart=always -e MYSQL_ROOT_PASSWORD=root -v ~/Dev/nicodeforge.github.io/renfo/local/mysql56/data/mysql:/var/lib/mysql  -d mysql:5.6

docker run -tid -p 3360:3306 --name mariadb --restart=always -v ~/Dev/nicodeforge.github.io/renfo/local/mysql56/data/mysql:/var/lib/mysql  -d mariadb:10.3

docker run -tid --name project-renfo --restart=always -e "env=local" --link mariadb:mysql -v $(pwd):/var/www/html -p 8888:80 richarvey/nginx-php-fpm:latest

#Database

- renforcement
	- user
		```
		CREATE TABLE `user` (`id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,`login` VARCHAR(255),`password` VARCHAR(255),`salt` VARCHAR(255),`display_name` VARCHAR(255),`permission_level` VARCHAR(255),`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP);
		```

		INSERT INTO user (login, password, salt,display_name,permission_level) VALUES ("nico","nico","nico","Nico","admin");


	- program

		```
		CREATE TABLE `program` (`id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE, `user_id` INT NOT NULL,`name` VARCHAR(255) NOT NULL, `length` TIME, type VARCHAR(255),content LONGTEXT, `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (user_id) REFERENCES user(id));
		```

		INSERT INTO program (user_id,name,length,type,content) VALUES (1,'00:25:00','Programme Court','Cardio & Renforcement','[{"id":0,"name": "Corde à sauter","length": "60"},{"id":1,"name": "Pause","length": "30"},{"id":2,"name": "Corde à sauter","length": "60"},{"id":3,"name": "Pause","length": "30"},{"id":4,"name": "Corde à sauter","length": "60"},{"id":5,"name": "Pause","length": "60"},{"id":6,"name": "Gainage passif face","length": "45"},{"id":7,"name": "Gainage côté droit","length": "45"},{"id":8,"name": "Gainage côté gauche","length": "45"},{"id":9,"name": "Pause","length": "45"},{"id":10,"name": "Gainage passif face","length": "45"},{"id":11,"name": "Gainage côté droit","length": "45"},{"id":12,"name": "Gainage côté gauche","length": "45"},{"id":13,"name": "Pause","length": "45"},{"id":14,"name": "Gainage passif face","length": "45"},{"id":15,"name": "Gainage côté droit","length": "45"},{"id":16,"name": "Gainage côté gauche","length": "45"},{"id":17,"name": "Pause","length": "60"},{"id":18,"name":"Abdos crunch face","length":"45"},{"id":19,"name":"Pause","length":"30"},{"id":20,"name":"Abdos obliques","length":"45"},{"id":21,"name":"Pause","length":"30"},{"id":22,"name":"Abdos crunch face","length":"45"},{"id":23,"name":"Pause","length":"30"},{"id":24,"name":"Abdos obliques","length":"45"},{"id":25,"name":"Pause","length":"30"},{"id":26,"name":"Abdos crunch face","length":"45"},{"id":27,"name":"Pause","length":"30"},{"id":28,"name":"Abdos obliques","length":"45"},{"id":29,"name":"Pause","length":"60"},{"id":30,"name":"Pompes mains écartés","length":"30"},{"id":31,"name":"Pause","length":"30"},{"id":32,"name":"Pompes mains serrés","length":"30"},{"id":33,"name":"Pause","length":"30"},{"id":34,"name":"Pompes mains largeur épaules","length":"30"},{"id":35,"name":"Pause","length":"60"},{"id":36,"name":"Etirements biceps","length":"30"},{"id":37,"name":"Etirements abdominaux","length":"30"},{"id":38,"name":"Etirements global","length":"45"},{"id":39,"name":"Etirements global","length":"45"}]');

		INSERT INTO program (user_id,name,length,type,content) VALUES (1,'01:00:00','Programme Long','Cardio & Renforcement','[{"id":0,"name": "Corde à sauter","length": "60"},{"id":1,"name": "Pause","length": "30"}]');
		
		
		
		- name
		- length
		- type
		- content

		
