<?php
	include "check_admin.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла
	//Удаляем из таблицы 'products' данные
	$connect->query("DELETE `products` FROM `products` WHERE `product_id`=".$_GET["id"]);
	//Выводим сообщение "Товар удален"
	return header("Location:../catalog.php?message=Товар удалён");
