<?php
	session_start(); //Запускаем сессию
	include "../connect.php"; //Включаем исполнение файла
	//Создаем запрос к таблице 'users'
	$sql = sprintf("SELECT * FROM `users` WHERE `login`='%s'", $_POST["login"]);
	if(!$result = $connect->query($sql)) //Если возникла ошибка при обработке запроса
	//Выводим сообщение об ошибке
		return die("Ошибка получения данных: ". $connect->query);
	//Иначе создаем ассоциативный массив найденных записей
	if($user = $result->fetch_assoc()) { //Если пароль совпадает с введенным в форму
		if($user["password"] == $_POST["password"]) { //Передаем параметр сессии 'id пользователя'

			$_SESSION["user_id"] = $user["user_id"];
			$_SESSION["role"] = $user["role"]; //И параметр 'права администратора'
			//Переходим на страницу корзины
			return header("Location:../cart.php");
		}
	}
	//Иначе выводим сообщение об ошибке авторизации
	return header("Location:../index.php?message=Ошибка логина или пароля");
