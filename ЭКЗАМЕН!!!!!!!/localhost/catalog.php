<?php
	session_start(); //Запускаем сессию
	include "connect.php"; //Включаем исполнение файла
	//Приравниваем переменной параметр прав доступа, если пользователь не авторизован, присваиваем ей значение "гость"
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

	$sql = "SELECT * FROM `categories`"; //Выбираем все строки из таблицы "категории"
	$result = $connect->query($sql); //Получаем результат запроса
	$categories = ""; //Получаем результат запроса
	while($row = $result->fetch_assoc())
		$categories .= sprintf('<option value="%s">%s</option>', $row["category"], $row["category"]);    //Получаем список категорий
	//Получаем список товаров, отсортированных по дате создания записи
	$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC";
	if(!$result = $connect->query($sql)) //Если запрос не выполнен
		return die ("Ошибка получения данных: ". $connect->error); //Выводим код об ошибке

	$data = ""; //Присваиваем переменной "data" пустое значение
	//Последовательно выводим блоки с товарами
	while($row = $result->fetch_assoc())
		$data .= sprintf('
			<div class="col">
			
			<input type="hidden" value="%s" name="country">
				<div class="row">
					<h3><a href="product.php?id=%s">%s</a></h3>
					<p>%sруб.</p>
					<input type="hidden" value="%s" name="product_id">
					<input type="hidden" value="%s" name="year">
					<input type="hidden" value="%s" name="category">
				</div>
				%s
				%s
			</div>
		', $row["path"], $row["product_id"], $row["name"], $row["price"], $row["product_id"], $row["year"], $row["category"],
		//Если есть права администратора показываем кнопки редактирования и удаления  товара
		($role == "admin") ? '
			<div class="row">
				<p><a href="update.php?id='.$row["product_id"].'" class="text-small">Редактировать</a></p>
				<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$row["product_id"].'" class="text-small">Удалить</a></p>
			</div>
		' : '',
		//Если нет прав админа, но пользователь авторизован, показываем кнопку добавления товара в корзину
		($role != "guest") ? '<p class="text-right"><a href="controllers/add_cart.php?id='. $row["product_id"] .'" class="text-small">В корзину</a></p>' : '');

	if($data == "") //Если переменная "data" так и не была заполнена
	//Выводим текст "Товары отсутствуют" 
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';

	include "header.php"; //Подключаем «шапку» сайта
?>
	<!--Основной контент-->
	<main>
		<div class="content">
		<!--Блок с товарами-->
			<div class="head" style="margin-bottom: 10px">Наши услуги</div>
			<div class="row" style="margin-bottom: 20px">
				<!--Добавим варианты сортировки товаров-->
				<p>
					<span id="year" onclick="filter.filter('all')">Все</span> | 
				
					<span id="name" onclick="filter.filter('name', 'sort')">Наименование</span> | 
					<span id="price" onclick="filter.filter('price', 'sort')">Цена</span>
				</p>
				<!--Добавим блоки для сортировки товаров по категориям-->
				<select id="category" onchange="filter.filter('category', 'filter')">
					<option value disabled selected>Фильтрация по категориям</option>
					<?= $categories ?>
				</select>
			</div>
			<!--Выводим список товаров-->
			<div class="row" id="products">
				<?= $data ?>
			</div>

		</div>
	</main>
	<!--Подключаем выполнение скрипта - фильтра-->
	<script>filter.products()</script>

