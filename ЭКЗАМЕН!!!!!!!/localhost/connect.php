<?php
	//Вводим имя хоста, имя пользователя, пароль и название БД
	$connect = new mysqli("localhost", "root", "", "db_demo");
	$connect->set_charset("utf8"); //Устанавливаем кодировку

	if($connect->connect_error) //Устанавливаем кодировку
		die("Ошибка подключения: ". $connect->connect_error); //Выводим текст ошибки