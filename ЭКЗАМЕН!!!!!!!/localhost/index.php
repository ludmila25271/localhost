<?php
	session_start(); //Запускаем исполнение сессии
	include "connect.php"; //Включаем исполнение файла
	//Получаем данные из таблицы товаров и добавляем на главную слайдером 5 товаров
	$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC LIMIT 5";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('
			<div class="slide col">
			
			<input type="hidden" value="%s" name="country">
				<h3><a href="product.php?id=%s">%s</a></h3>
			</div>
		', $row["path"], $row["product_id"], $row["name"]);
	//Если товары отсутствуют в каталоге
	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';

	include "header.php"; //Подключаем «шапку» сайта
?>
	<!--Основной контент-->
	<main>
		<div class="content">
			<h2 class="center"><br> Наша компания имеет богатейший опыт по оказанию услуг профессионального клининга в самых различных сферах. Уже более 10 лет мы занимаемся уборкой квартир!</h2>
			<!--Блок с последними товарами организации-->
			<div class="head">Услуги</div>

			<div id="slider">
				<div class="slides">
					<?= $data ?>
				</div>
			</div>

	</main>
	<!--Присоединяем скрипт слайдера-->
	<script src="scripts/slider.js"></script>
<!--Присоединяем "подвал"--><?php include "footer.php" ?>