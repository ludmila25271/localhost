<?php
	include "check_admin.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла
	//Изменяем статус заказа
	$connect->query("UPDATE `orders` SET `status`='Подтверждённый' WHERE `order_id`=".$_POST["id"]);
	//Выводим сообщение " Статус заказа изменён на "Подтвержденный""
	return header("Location:../admin.php?message=Статус заказа изменёна на \"Подтверждённый\"");
