<?php
	include "check.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла
	//Подтверждаем заказ паролем от личного кабинета, если не совпадает
	$sql = sprintf("SELECT * FROM `users` WHERE `user_id`='%s'", $_SESSION["user_id"]);
	if($connect->query($sql)->fetch_assoc()["password"] != $_POST["password"])
		//Выводим сообщение "Ошибка пароля"
		return header("Location:../cart.php?message=Ошибка пароля");
	//Иначе заполняем таблицу заказов
	$sql = sprintf("SELECT SUM(`count`) FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION["user_id"]);
	$count = $connect->query($sql)->fetch_array()[0];
	//Заполняем каждую ячейку таблицы 'orders' новыми данными
	$connect->query(sprintf("INSERT INTO `orders`(`product_id`, `user_id`, `number`, `count`, `status`) VALUES('0', '%s', '%s', '%s', 'Новый')", $_SESSION["user_id"], rand(1000000000, 2000000000), $count));
	//Удаляем из таблицы 'orders' данные заказа
	$connect->query(sprintf("DELETE FROM `orders` WHERE `user_id`='%s' AND `number` IS NULL", $_SESSION["user_id"]));
	//Выводим сообщение "Заказ оформлен"
	return header("Location:../cart.php?message=Заказ оформлен");
