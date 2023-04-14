<?php
	include "check.php"; //Включаем исполнение файла

	if($_SESSION["role"] != "admin") //Если роль пользователя не администратор
	//Выводим сообщение "Отказано в доступе"
		return header("Location:../cart.php?message=Отказано в доступе");
