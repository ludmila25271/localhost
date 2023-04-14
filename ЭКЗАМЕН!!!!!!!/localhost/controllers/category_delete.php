<?php
	include "check_admin.php"; //Включаем исполнение файла 
	include "../connect.php"; //Включаем исполнение файла 
	$category=$_POST["category"];
	//Удаляем из таблицы 'categories' данные
	$connect->query("DELETE FROM `categories` WHERE `category`= '$category'");
	//Выводим сообщение "Категория удалена"
	return header("Location:../admin.php?message=Категория удалена");
