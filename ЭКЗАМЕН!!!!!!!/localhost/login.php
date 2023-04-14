<?php
	session_start(); //Запускаем сессию 
	include "connect.php"; //Включаем исполнение файла
	include "header.php"; //Включаем исполнение файла
?>
	<!--Основной контент-->
	<main>
		<div class="content">
		<!--Блок регистрации-->
			<div class="head" id="register">
				<h1><b>Зарегистрируйтесь или авторизируйтесь</b></h1>
	          <h3>Так вам будет проще оформлять заказы у нашей организации!</h3>
			</div>
			<form action="controllers/register.php" method="POST">
				<input type="text" placeholder="Имя" name="name" pattern="[а-яА-ЯёЁ\s\-]+" required>
				<input type="text" placeholder="Фамилия" name="surname" pattern="[а-яА-ЯёЁ\s\-]+" required>
				<input type="text" placeholder="Отчество" name="patronymic" pattern="[а-яА-ЯёЁ\s\-]+">
				<input type="text" placeholder="Логин" name="login" pattern="[a-zA-Z0-9\-]+" required>
				<input type="email" placeholder="Email" name="email" required>
				<input type="password" placeholder="Пароль" name="password" pattern=".{6,}" required>
				<input type="password" placeholder="Повтор пароля" name="password_repeat" required>
				<div class="part">
					<label>
						<input type="checkbox" name="rules" required /> Я ознакомлен(-а) с <a href="Задание.html" target="_blank"> Правилами регистрации</a>
					</label>
				</div>
				<button>Зарегистрироваться</button>
				<p>
        			У вас уже есть аккаунта? - <a href="#login">авторизуйтесь</a>!
    			</p>
			</form>
			<!--Блок авторизации-->
			<div class="head" id="login">
				<h1><b>Авторизируйтесь для оформления покупок</b></h1>
			         <h3>Мы ждем ваших покупок в нашем магазине!</h3>
			</div>
			<form action="controllers/login.php" method="POST">
				<input type="text" placeholder="Логин" name="login" required>
				<input type="password" placeholder="Пароль" name="password" required>
				<button>Войти</button>
				<p>
				        У вас нет аккаунта? - <a href="#register">зарегистрируйтесь</a>!
				</p>
			</form>
		</div>
	</main>
<!--Присоединяем "подвал"-->
<?php include "footer.php" ?>