<?php
	include "../connect.php"; //Включаем исполнение файла
	//Заполняем каждую ячейку таблицы 'users' новыми данными
	$sql = sprintf("INSERT INTO `users` VALUES(NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
		$_POST["name"], $_POST["surname"], $_POST["patronymic"], $_POST["login"], $_POST["email"], $_POST["password"], "client"
	);
	if(!$connect->query($sql))
		return die("Ошибка добавления данных: ". $connect->error);
	//Иначе переходим на главную страницу с сообщением "Вы зарегистрировались"
	return header("Location:../index.php?message=Вы зарегистрировались");
