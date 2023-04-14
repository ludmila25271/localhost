<?php //Меню сайта в зависимости от прав меняется
	$menu = '
		<li><a href="index.php"><b>Главная</b></a></li>
		<li><a href="catalog.php"><b>Каталог</b></a></li>
	
		%s
	';

	$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<li><a href="cart.php"><b>Корзина</b></a></li>';
		$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php"><b>Заказы</b></a></li>' : '';
		$m .= '<li><a href="controllers/logout.php"><b>Выход</b></a></li>';
	} else
		$m = '
			<li><a href="login.php#login"><b>Вход </b></a>/<a href="login.php#register"><b> Регистрация</b></a></li>
		';

	$menu = sprintf($menu, $m);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интернет-магазин</title>
	<link rel="stylesheet" href="main.style.css">
	<script src="scripts/filter.js"></script>
	<script>
		let role = "<?= (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest" ?>";
	</script>
</head>
<body>
	<!--Логотип, шапка сайта-->
	<header>
		<div class="top">
			<div class="row">
				
				<a href="index.php">
				<h1>Уборка с умом</h1>
				</a>
			</div>
		</div>
		<!--Присоединяем меню через php-->
		<div class="content">
			<ul>
				<?= $menu ?>
			</ul>
		</div>
	</header>

	<div class="message"><?= (isset($_GET["message"])) ? $_GET["message"] : ""; ?></div>