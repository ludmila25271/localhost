<?php
	include "check.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла

	$id = $_GET["id"];
	//Получаем заказ из таблицы в соответствии с id пользователем
	$order = $connect->query("SELECT * FROM `orders` WHERE `user_id`='".$_SESSION["user_id"]."' AND `order_id`=".$id)->fetch_assoc();

	if($order["status"] != "Новый")
		//Выводим сообщение "Удалять можно только заказы со статусом "Новый""
		return header("Location:../cart.php?message=Удалять можно только заказы со статусом \"Новый\"");
	//Удаляем заказ из таблицы
	$connect->query("DELETE FROM `orders` WHERE `order_id`=".$order["order_id"]);
	//Выводим сообщение "Заказ удалён"
	return header("Location:../cart.php?message=Заказ удалён");
