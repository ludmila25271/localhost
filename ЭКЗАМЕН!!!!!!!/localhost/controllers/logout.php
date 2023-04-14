<?php
	include "check.php"; //Включаем исполнение файла
	//Закрываем использование сессий
	unset($_SESSION["user_id"]);
	unset($_SESSION["role"]);
	//Возвращаем сообщение "Вы вышли"
	return header("Location:../index.php?message=Вы вышли");
