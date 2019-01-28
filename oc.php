<!DOCTYPE html>
<html>
<head>
	<title> Операционные системы </title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<div id="container">
		<div id="header">
			<h1> Проблемы при установке   </h1>
			<h2> Операционных систем </h2>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php"> Главная </a></li>
				<li><a href="oc.php"> Операционные системы </a></li>
				<li><a href="poisk.php"> Поиск </a></li>
				<li><a href="gostevaya_kniga.php"> Гостевая книга </a></li>
				<li><a href="kontakti.php"> Контакты </a></li>
				<li><a href="add.php"> Редактор </a></li>
			</ul>
		</div>
		<div id="content">
			<p>
				Наш сайт содержит детальные сведения о множестве возникших проблем с операционными системами. Для вас имеется возможность детально ознакомиться с любым продуктом.
			</p>
			<h2> Какая операционная система вам требуется? </h2>
			<p>
				<br>
					<form name="osType" action="osSelect.php" method="POST">
						<select name="osType" size="1" >
							<option value="cli">Клиентская ОС</option>
							<option value="srv">Серверная ОС</option>						
						</select>
							<input type="submit" name="typeSelected" value="Продолжить выбор">
					</form>
				</br>						
			</p>
		</div>
</div>
</body>
</html>