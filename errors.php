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
			<!-- <h2> Выберите операционную стсему из списка: </h2> -->
			<!-- <br> -->
			<p> 
				<?php 
					include_once 'include.php';
					if(isset($_GET['os'])) {
						$os = $_GET['os']; //получаем ID операционной системы, по нему выбираем ошибки
						$q = 'SELECT * FROM errors WHERE os_id='.$os.' ORDER BY id';
						//$q = 'SELECT * FROM os INNER JOIN errors ON os.id = errors.os_id WHERE os.id='.$os;

					} else {
						// если ОС не установлена (прямое обращение) = выберем все ошибки по всем ОС
						$q = 'SELECT * FROM errors ORDER BY id';
						// для дальнейшего формирования страницы пометим номер ОС в базе как "ВСЕ"
						$os = '_ALL_'; 
					};

					// echo($q); // отладочный вывод

					if ($os == '_ALL_') {
						// если ОС не установлеа, выводим заголовок
						$header = 'Все ошибки';
						
					} else {
						//если ОС задана, покажем что это за ОС
						// запрос имени ОС из базы
						$q_os = 'SELECT * FROM os WHERE id='.$os;
						$query_os = mysql_query($q_os);
						$currentOS = mysql_fetch_array($query_os);
						$header = $currentOS['name'];
					};

					// выводим название ОС\"все ос" перед таблицей
					echo('<h2>'.$header.':</h2>');

					// получаем ее ошибки
					$query = mysql_query($q);
					$errors = mysql_fetch_array($query);

					// вывод заголовка таблицы
					echo('<table border>
						<br>
						<tr> 
							<td> №№ </td> 
							<td> Название </td> 
						</tr>');

					// вывод ошибок в цикле (только заголовки)
					// сначала номер ошибки, 
					// потом заголовок ввиде ссылки на полное описание ошибок
					do {
						echo('<tr> 
							<td> '.$errors['id'].' </td> 
							<td> <a href="single_error.php?err='.$errors['id'].'"> '.$errors['err_title'].' </a> </td> 
							</tr>');

					} while($errors = mysql_fetch_array($query));
					echo('</table>');
				 ?>
			</p>
		</div>
	</div>
</body>
</html>