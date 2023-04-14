<?php
	session_start(); //Запускаем сессию

	if(!isset($_SESSION["user_id"])) //Если параметр 'id пользователя' не найден
	//Выводим сообщение "Вы не авторизованы"
		return header("Location:../index.php?message=Вы не авторизованы");
