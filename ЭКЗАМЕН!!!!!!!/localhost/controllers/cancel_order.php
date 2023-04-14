<?php
	include "check_admin.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла
	//Изменяем статус заказа
	$connect->query(sprintf("UPDATE `orders` SET `status`='Отменённый',`reason`='%s' WHERE `order_id`='%s'", $_POST["reason"], $_POST["id"]));
	//Выводим сообщение " Статус заказа изменён на "Отменённый""
	return header("Location:../admin.php?message=Статус заказа изменёна на \"Отменённый\"");
