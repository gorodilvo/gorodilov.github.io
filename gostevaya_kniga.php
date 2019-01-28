<!DOCTYPE html>
<html>
<head>
	<title> Гостевая книга </title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<div id="container">
		<div id="header">
			<h1> Гостевая книга </h1>
			<h2> Операционные системы </h2>
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
			<h3> Оставить отзыв: </h3> <br>
			<form name="gBook" action="gostevaya_kniga.php" method="POST">
				Ваше Имя: <input type="text" name="guestName" placeholder="Ваше имя" /> <br>
				Комментарий:<br> <textarea name="guestComment" placeholder="Ваш комментарий" cols=60 rows="3"></textarea> <br>
				<input type="submit" name="leaveComment" value="Оставить отзыв">
			</form>

			<h3> Оставленные отзывы: </h3>
			<p>
			<?php 
				include_once 'include.php';
				if(isset($_POST['leaveComment'])) {
					// получаем имя и текст комментария
					$name = $_POST['guestName'];
					$comment = $_POST['guestComment'];
					$cDate = date('Y-m-d'); // берем текущую дату как время отправки коммента

					// формируем запрос
					$q = 'INSERT INTO guestbook(name, comment, date) VALUES ("'.$name.'", "'.$comment.'", "'.$cDate.'")';
					//echo($q); // отладка
					// выполняем запро
					$query = mysql_query($q);
					mysql_query($query);
					header('Location: gostevaya_kniga.php');

				} else {
					$q = 'SELECT * FROM guestbook ORDER BY date';
					$query = mysql_query($q);
					$comments = mysql_fetch_array($query);

					do {
						echo('<p> <b>'.$comments['name'].' @ '.$comments['date'].'</b> <br>');
						echo($comments['comment'].'</p> <br>');
					} while ($comments = mysql_fetch_array($query));
				}
			?>
			</p>
		</div>
</div>
</body>
</html>
