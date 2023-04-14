<?php
	include "check.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла
	$id = $_GET["id"];
	//Получаем данные о продукте и заказах в соответствии с id пользователя
	$sql = sprintf("SELECT `order_id`, `product_id`, `number`, `orders`.`count` as `ocount`, `name`, `products`.`count` as `pcount` FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`='%s' AND `product_id`='%s'", $_SESSION["user_id"], $id);
	$order = $connect->query($sql)->fetch_assoc();

	if($order["ocount"] > 1)
		//Изменение данных о заказах
		$connect->query(sprintf("UPDATE `orders` SET `count`='%s' WHERE `order_id`='%s'", --$order["ocount"], $order["order_id"]));
	else
		//Удаляем товары из корзины
		$connect->query(sprintf("DELETE FROM `orders` WHERE `user_id`='%s' AND `product_id`='%s'", $_SESSION["user_id"], $order["product_id"]));
	//Изменение данных о продуктах
	$connect->query(sprintf("UPDATE `products` SET `count`='%s' WHERE `product_id`='%s'", ++$order["pcount"], $order["product_id"]));
	//Выводим сообщение "Товар удалён из корзины"
	return header("Location:../cart.php?message=Товар удалён из корзины");