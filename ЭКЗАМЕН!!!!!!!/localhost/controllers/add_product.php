<?php
	include "check_admin.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла

	$path = "images/product/". time() ."_". $_FILES["image"]["name"];
	move_uploaded_file($_FILES["image"]["tmp_name"], "../".$path);
	//Добавляем в таблицу 'products' новые данные
	$connect->query(sprintf("INSERT INTO `products`(`name`, `price`, `country`, `year`, `model`, `category`, `count`, `path`) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $_POST["name"], $_POST["price"], $_POST["country"], $_POST["year"], $_POST["model"], $_POST["category"], $_POST["count"], $path));
	//Выводим сообщение "Товар добавлен"
	return header("Location:../admin.php?message=Товар добавлен");
