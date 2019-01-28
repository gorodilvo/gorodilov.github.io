<!DOCTYPE html>
<html>
<head>
	<title> Поиск </title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<div id="container">
		<div id="header">
			<h1> Поиск проблем при установке   </h1>
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
				<form name="searchField" action="poisk.php" method="POST">
					<input type="text" name="searchStr" placeholder="Поиск ошибки" />
					<input type="submit" name="goSearch" value="Искать" />
				</form>

				<?php 
					if(isset($_POST['goSearch'])) {
						include_once 'include.php';
						$sPattrn = $_POST['searchStr']; // забираем поисковую строку
						// формирукм запрос к базе, поиск по заголовку и тексту ошибки
						$q = 'SELECT *, errors.id AS err_id FROM errors INNER JOIN os on errors.os_id = os.id WHERE errors.err_title LIKE "%'.$sPattrn.'%" OR errors.err_text LIKE "%'.$sPattrn.'%"';
						//echo($q);
						
						// выполняем запрос и скачиваем результаты 
						$query = mysql_query($q);
						$result = mysql_fetch_array($query);

						 // заголовок таблицы
						echo('<table>
							<tr>
							<td> Операционная система </td>
							<td> Проблема </td>
							<td> Открыть </td>
							</tr>');
						do {
							// приводим типы ОС к человекочитаемому виду
							if($result['serv'] == 'srv') {$osType = 'Серверная';}; 
							if($result['serv'] == 'cli') {$osType = 'Клиентская';};
							
							echo('<tr> 
								<td>'.$result['name'].'('.$osType.')</td>
								<td>'.$result['err_title'].'</td>
								<td> <a href="single_error.php?err='.$result['err_id'].'" target="_blank"> в новом окне </a></td>');
						} while ($result = mysql_fetch_array($query));

					};
				 ?>
			</p>
		</div>
</div>
</body>
</html>