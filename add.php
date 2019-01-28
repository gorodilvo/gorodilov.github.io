<!DOCTYPE html>
<html>
<head>
	<title> Добавление </title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<div id="container">
		<div id="header">
			<h1> Добавление </h1>
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
			<h3> Добавить Операционную систему: </h3>
			<form name="addOS" action="add.php" method="POST">
				<select name="osType">
					<option value="srv">Серверные ОС</option>
					<option value="cli">Клиентские ОС</option>
				</select>
				<input type="text" name="osName" placeholder="Название ОС" required />
				<input type="submit" name="add_OS" value="Добавить ОС" />
			</form>
			<br> <br>

			<hr>
			<h3> Добавить проблему: </h3>
			<form name="addError" action="add.php" method="post">
				<select name="os_name">
					<?php 
						include_once 'include.php';

						$q = 'SELECT * FROM os ORDER BY name';
						$query = mysql_query($q);
						$allOS = mysql_fetch_array($query);

						do {
							echo('<option value="'.$allOS['id'].'"> '.$allOS['name'].' </option>');
						} while ($allOS = mysql_fetch_array($query));
					 ?>
				</select> <br>
				<input type="text" name="err_title" placeholder="Название проблемы" required /> <br>
				<textarea name="err_text" cols="60" rows="3"> Введите тут текст проблемы </textarea> <br>
				<input type="submit" name="addError" value="Добавить проблему" />
			</form>
			<?php 
				include_once 'include.php';

				if(isset($_POST['add_OS'])) {
					$name = $_POST['osName'];
					$type = $_POST['osType'];

					$q_os = 'INSERT INTO os(name, serv) VALUES ("'.$name.'", "'.$type.'")'	;
					//echo($q_os);
					
					$query_os = mysql_query($q_os);
					mysql_query($query_os);

					echo('<br><b>ОС добавлена.</b>');
					header('Location: add.php');
					
				};

				if(isset($_POST['addError'])) {
					$os = $_POST['os_name'];
					$er_title = $_POST['err_title'];
					$er_text = $_POST['err_text'];

					$q_err = 'INSERT INTO errors(os_id, err_title, err_text) VALUES ("'.$os.'", "'.$er_title.'", "'.$er_text.'")';
					//echo($q_err);


					$query_err = mysql_query($q_err);
					mysql_query($query_err);

					echo('<br><b>Ошибка добавлена.</b>');
					header('Location: add.php');

				}
 			?> 
			</p>
		</div>
</div>
</body>
</html>
