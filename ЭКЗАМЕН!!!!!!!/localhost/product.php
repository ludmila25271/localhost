<?php
	session_start(); //Запускаем сессию 
	include "connect.php"; //Включаем исполнение файла 
	//Приравниваем переменной параметр прав доступа, если пользователь не авторизован, присваиваем ей значение "гость"
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
	//Присваиваем переменной значение переданного id, если он не передан, то переменная равна 0
	$id = (isset($_GET["id"])) ? $_GET["id"] : 0;
	//Получаем товар из таблицы в соответствии с id
	$sql = "SELECT * FROM `products` WHERE `count` > 0 AND `product_id`=". $id;
	if(!$result = $connect->query($sql)) //Если запрос не выполнен
		return die ("Ошибка получения данных: ". $connect->error); 

	if(!$product = $result->fetch_assoc()) //Если товар не найден
		return header("Location:index.php?message=Товар отсутствует"); //Выводим сообщение "товар отсутствует"
	//Подключаем «шапку» сайта
	include "header.php";
?>
	<!--Основной контент-->
	<main>
		<!--Блок страницы товара-->
		<div class="content">
			
			<div class="head"><?= $product["name"] ?></div>
			<div class="product wrap">
				
				<div class="text">
					<h3>Услуга:</h3>
					<!--Выводим значение каждого столбца, ссылаясь на sql-запрос-->
					<p>Описание: <b><?= $product["country"] ?></b></p>
				
			
					<hr>
					<div class="row">
						<p>Цена:</p>
						<h3><?= $product["price"] ?>руб.</h3>
					</div>
					<?php
					//Если есть права администратора, то отображаем кнопки редактирования и удаления товара
						if($role == "admin")
							echo '
								<div class="row">
									<p><a href="update.php?id='.$product["product_id"].'" class="text-small">Редактировать</a></p>
									<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$product["product_id"].'" class="text-small">Удалить</a></p>
								</div>
							';
					//Если это пользователь, отображаем кнопку добавления в корзину
						if($role != "guest")
							echo '<p class="text-right"><a href="controllers/add_cart.php?id='. $product["product_id"] .'" class="text-small">В корзину</a></p>';
					?>
				</div>
			</div>

		</div>
	</main>

<?php include "footer.php" //Подключаем подвал сайта?>