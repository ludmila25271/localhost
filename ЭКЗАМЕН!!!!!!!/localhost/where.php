<?php
	session_start(); //Запускаем сессию 
	include "header.php"; //Включаем исполнение файла
?>
	<!--Основной контент-->
	<main>
		<div class="content">
		<!--Блок информации о местонахождении организации-->
			<div class="head">Наши контакты</div>
			<p>Адрес: <b>г. Рязань</b></p>
			<p>Номер телефона: <b>8-800-800-80-80</b></p>
			<p>Email: <b>mail@gmail.ru</b></p>
			
			<div class="head">Наше местоположение</div>
			<img src="images/map.jpg" alt="Карта г. Рязань">

		</div>
	</main>
<!--Присоединяем "подвал"-->
<?php include "footer.php" ?>