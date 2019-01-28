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
				<?php 
					include_once 'include.php';
					if(isset($_GET['err'])) {
						// id ошибки передан, работаем 
						$err = $_GET['err'];
						$q = 'SELECT * FROM errors WHERE id='.$err;
						//echo($q); // отладка

						// запрашиваем ошибку
						$query = mysql_query($q);
						$error = mysql_fetch_array($query);

						// запрашиваем имя ОС, которой принадлежит эта ошибка
						$q_os = 'SELECT * FROM os WHERE id='.$error['os_id'];
						$query_os = mysql_query($q_os);
						$curOS = mysql_fetch_array($query_os);
						$osName = $curOS['name']; // имя ОС в человекопонятном виде

						echo('<h3>'.$osName.': '.$error['err_title'].'</h3><br><hr>');

						echo('<p>'.$error['err_text'].'</p>');

					} else {
						// id ошибки не передан, шлем юзера вжопу
						echo('<h1> Уупс =_= </h1> <br>
							не задан номер ошибки, вернитесь на <a href="index.php"> главную</a> и попробуйте снова.');
					};
				 ?> 			
		</div>
	</div>
</body>
</html>