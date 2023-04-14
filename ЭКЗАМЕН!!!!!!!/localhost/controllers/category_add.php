<?php
	include "check_admin.php";   //Включаем исполнение файла 
	include "../connect.php";   //Включаем исполнение файла 
	//Добавляем в таблицу 'categories' новые данные
	$connect->query("INSERT INTO `categories`(`category`) VALUES('".$_POST["category"]."')");
	//Выводим сообщение "Категория добавлена"
	return header("Location:../admin.php?message=Категория добавлена");
