<?php
	include "check.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла

	$id = $_GET["id"];

	$sql = "SELECT * FROM `products` WHERE `product_id`=".$id;
	$product = $connect->query($sql)->fetch_assoc();

	if($product["count"] <= 0)
		//Выводим сообщение "Товар отсутствует"
		return header("Location:../cart.php?message=Товар отсутствует");
	//Получаем заказ из таблицы в соответствии с id пользователем
	$sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `product_id`='%s'",$_SESSION["user_id"], $id);
	if($order = $connect->query($sql)->fetch_assoc())
		//Изменение данных о заказах
		$connect->query(sprintf("UPDATE `orders` SET `count`='%s' WHERE `order_id`='%s'", ++$order["count"], $order["order_id"]));
	else
		//Добавляем товары в корзину
		$connect->query(sprintf("INSERT INTO `orders`(`product_id`, `user_id`, `count`) VALUES('%s', '%s', '%s')", $product["product_id"], $_SESSION["user_id"], 1));
	//Изменение данных о продуктах
	$connect->query(sprintf("UPDATE `products` SET `count`='%s' WHERE `product_id`='%s'", --$product["count"], $product["product_id"]));

	return header("Location:../cart.php?message=Товар добавлен в корзину"); //Выводим сообщение "Товар добавлен в корзину"
