<!DOCTYPE html>
<head>
    <meta charset="UTF-8" lang="ru">
	<meta name="description" content="This is second lab">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="laba2.css" type="text/css">
    <title>Test</title>    
</head>
<body>
	<header>
		<?php
			// формирование массива с названиями ссылок
			$navs = array('Главная', 'Новости', 'Отзывы', 'Работы', 'Контакты');    
				// проверка не NULL ли полученная переменная
		    //if(isset($_GET['id'])) {
				// кладем в переменную ее id
				//$id = $_GET['id'];					
			//}
			//else {
				// иначе id - 0
				//$id = 0;
			//}
		?>
		<nav>
			<ul>
				<?php
					// перебор названий ссылок в массиве
					foreach($navs as $key => $nav):                               
                ?>
                <li> 
					<?php 
						//if($key <> $id) {
					?>
					<!--пишем id ссылки на которую перешли-->
                    <a href="lab2.php?#id=
						<?=$key?>
					">
						<!--ставим название ссылки-->
						<?=$nav?>
					</a>
                    <?php 
						//} else { 
					?>
					<!--ставим название ссылки
                    <a href="#id=0">
						<?//=$nav?>
					</a>-->
                    <?php 
						//} 
					?>
                </li>
				<?php 
					// конец перебора названий ссылок в массиве
					endforeach;
				?>
			</ul>
		</nav>   
	</header>
	<main>
		<div>
			<form method="POST"> <!--Используем метод Post-->
				<textarea name="message" placeholder="Введите что-нибудь"><?php if(isset($_POST['enter'])) {echo $_POST['message'];}?></textarea>
                <input type="submit" name="enter" value="Отправить">
				<?php	  	
					$inputLine = '';					
					if (isset($_POST['enter'])) {
						// кладем в переменную сообщение взятое из формы
						$inputLine = $_POST['message'];
					}					 
					// количество элементов на уровнях	
					$pos = -1;
					$count = 0;
					$matrix[5][5][5][5][5];	 // наша матрица
					$arr = explode(",", $inputLine);   // получаем массив чисел
					// раскладываем числа равномерно по всем уровням матрицы
					for($i = 0; $i <= count($arr) + 1; $i++) {						
						if(is_numeric($arr[$i])) {		
							$pos++;
							if($pos == 5) {
								$pos = 0;
								$count++;
							}
							$matrix[$pos][$pos][$pos][$pos][$count] = $arr[$i];						
						}						
					}						
				?>    				
				<h1>Первый уровень:</h1>	
				<div style="Color: red";>
					<?php	
						$count++;
						// вывод значений по уровням с определенным цветом
						for($i = 0; $i < $count; $i++) {							
							echo $matrix[0][0][0][0][$i], ' ';
						}
					?>
				</div>	
				<h4>Второй уровень:</h4>	
				<div style="Color: blue";>
					<?php	
						// вывод значений по уровням с определенным цветом
						for($i = 0; $i < $count; $i++) {		
							echo $matrix[1][1][1][1][$i], ' ';
						}	
					?>
				</div>	
				<h4>Третий уровень:</h4>	
				<div style="Color: green";>
					<?php	
						// вывод значений по уровням с определенным цветом
						for($i = 0; $i < $count; $i++) {		
							echo $matrix[2][2][2][2][$i], ' ';
						}	
					?>
				</div>
				<h4>Четвертый уровень:</h4>	
				<div style="Color: purple";>
					<?php	
						// вывод значений по уровням с определенным цветом
						for($i = 0; $i < $count; $i++) {		
							echo $matrix[3][3][3][3][$i], ' ';
						}	
					?>
				</div>
				<h4>Пятый уровень:</h4>	
				<div style="Color: yellow";>
					<?php	
						// вывод значений по уровням с определенным цветом
						for($i = 0; $i < $count; $i++) {		
							echo $matrix[4][4][4][4][$i], ' ';
						}	
					?>
				</div>	
				<h4>Сортировка:</h4>
				<?php		
					// сортируем массив методом выбора
					for($i = 0; $i < count($arr); $i++) {
						$min = $i;
						for($j = $i + 1; $j < count($arr); $j++) {
							if($arr[$min] > $arr[$j]) {
								$min = $j;
							}			
						}		
						// перестановка значений в массиве
						$temp = $arr[$min];
						$arr[$min] = $arr[$i];
						$arr[$i] = $temp;		
						if(is_numeric($arr[$i])) {
							if($arr[$i] % 2 == 0 && $arr[$i] != 0) {
								// если число четное красим его в красный, нули отбрасываем
								echo '<span style="Color: red";>'.$arr[$i].'</span>';			
							} 
							else if($arr[$i] % 2 != 0) {
								// иначе - в фиолетовый 
								echo '<span style="Color: purple";>'.$arr[$i].'</span>';
							}
							echo ' ';	
						}						
					}			
				?>
			</form>
		</div>
	</main>
</body>
</html>