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
			<h2> Выберите операционную систему из списка, по которой у вас возникли проблемы: </h2>
			<br>
			<p> 
				<?php 
				include_once 'include.php';
				
				if(isset($_POST['typeSelected'])) {
					$type = $_POST['osType'];

					if($type == 'cli') {
						// выбраны клиентские ОС
						$q = 'SELECT * FROM os WHERE serv="cli" ORDER BY name';

					} elseif ($type == 'srv') {
						// выбраны серверные ОС
						$q = 'SELECT * FROM os WHERE serv="srv" ORDER BY name';	

					} else {
						// не выбрано никаких ОС, выводим все ошибки
						$q = 'SELECT * FROM os ORDER BY name';
				};

				//echo($q);
				$query = mysql_query($q);
				$OS = mysql_fetch_array($query);

				echo('<table border>
					<tr> 
						<td> Название </td> 
						<td> Тип </td> 
						<td> Проблемы </td> 
					</tr>');

				do {
					if($OS['serv'] == 'cli') { $type = 'Клиентская';};
					if($OS['serv'] == 'srv') { $type = 'Серверная';};
					echo('<tr> 
						<td> '.$OS['name'].' </td> 
						<td> '.$type.' </td> 
						<td> <a href="errors.php?os='.$OS['id'].'"> Показать </a> </td> 
						</tr>');

				} while($OS = mysql_fetch_array($query));
				echo('</table>');
				}
		 	?>

 			</p>
		</div>
</div>
</body>
</html>