<?php
	include "check_admin.php"; //Включаем исполнение файла
	include "../connect.php"; //Включаем исполнение файла

	if($_FILES["image"]["error"])
		$path = $_POST["path"];
	else {
		$path = "images/upload/1_". time() ."_". $_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"], "../".$path);
	}
	//Изменяем в таблице 'products' данные
	$connect->query(sprintf("UPDATE `products` SET `name`='%s', `price`='%s', `country`='%s', `year`='%s', `model`='%s', `category`='%s', `count`='%s', `path`='%s' WHERE `product_id`='%s'", $_POST["name"], $_POST["price"], $_POST["country"], $_POST["year"], $_POST["model"], $_POST["category"], $_POST["count"], $path, $_POST["id"]));
	//Выводим сообщение "Товар изменен"
	return header("Location:../product.php?id=".$_POST["id"]."&message=Товар изменён");
