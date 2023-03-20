<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-RU-Compatible" content = "ie=edge">
	<title> SNAKE </title>
	<link rel = "stylesheet" href = "css/style.css">
 <script  src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
</head>

<header> 
  <div class = "exit">
    <form action = "index.php">
   <button class = "exit" type="submit" name="submit" value="Выйти">Выйти</button>
</form>
  </div>

	<h1>Добро пожаловать в игру "Змейка"	
		
</h1>
<div class = "table">
  <h2>Таблица лидеров</h2>
  
  <h5 id = "test1"> </h5>

</div>
	<div class = "record">
		<h2>рекорд:</h2> 
		<h3 id = "record" >0</h3>
    <h5 id = "found"></h5>
		<h4 id = "nick">
			Имя
		</h4> 

		
	</div>
		<div class = "score">
		<h2>счет:</h2> 
		<h3 id = "score">0</h3>

	</div>
    

</header>

<body>
	
<div class = "backgroundfon" center>
	
	<canvas width="500" height="500" id="game"></canvas>


    
	</div>
		
</body>
<script>// Поле, на котором всё будет происходить, — тоже как бы переменная
    let canvas = document.getElementById('game');
    // Классическая змейка — двухмерная, сделаем такую же
    let context = canvas.getContext('2d');
    // Размер одной клеточки на поле — 25 пикселей
    let grid = 25;
    // Служебная переменная, которая отвечает за скорость змейки
    let count = -5;
    let users = [] // все игроки, имеющие рекорд отличный от нуля
    // А вот и сама змейка
    let score = 0; // счет
    let gameOver = false;
    let req = null;
    let nick = "<?php echo $_SESSION ['nickname']; ?>"; // получение имени из базы данных, присвоение его к переменной
    var cancelAnimationFrame = window.cancelAnimationFrame;
    var stop = window.stop;
   if(localStorage.getItem('users')){
    const previousUsers = JSON.parse(localStorage.getItem('users'));
    users = previousUsers.sort(function(a,b){
      return b.record - a.record;
    })
    console.log(users) // вывод игроков и добавление игрока после игры
   }
    
  let found;
  let record;
  if(found = users.find(e => e.nick === "<?php echo $_SESSION ['nickname']; ?>")){
console.log(userrecord = found.record);
  userrecordnumber = Number(userrecord);
  console.log(typeof(userrecordnumber));
  
  record = userrecordnumber; // если рекорд есть в localstorage, то получаем его оттуда
  }
   else{
record = 0; // если игрок зашел первый раз, то его рекорду присваивается значение 0
   }
   // лучший результат
  
   const RedrawUsersScoreList = () => {
      document.getElementById('test1').innerHTML = users.map(user => 
      `
        <li style="display: flex; align-items: center; justify-content: space-between;justify-content: space-between; margin-bottom:-30px; padding-left:10px; padding-right:10px">
          <p style = "padding-left:10px;padding-right:40px">${user.nick}</p>
          <p style = "padding-left:10px">${user.record}</p>
        </li>
      `
    ).join(' ')
    }
 RedrawUsersScoreList();
    
    document.getElementById('nick').innerHTML = 'Игрок: '+ nick; // вывод переменной
    var snake = {
      // Начальные координаты
      x: getRandomInt(0, 20) * grid,
      y: getRandomInt(0, 20) * grid,
      // Скорость змейки — в каждом новом кадре змейка смещается по оси Х или У. На старте будет двигаться горизонтально, поэтому скорость по игреку равна нулю.
      dx: grid,
      dy: 0,
      // Тащим за собой хвост, который пока пустой
      cells: [],
      // Стартовая длина змейки — 4 клеточки
      maxCells: 4
    };
    // А это — еда. Представим, что это красные яблоки.
    var apple = {
      // Начальные координаты яблока
      x: 300,
      y: 300
    };


    // Делаем генератор случайных чисел в заданном диапазоне
    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min)) + min;
    }
    // Игровой цикл — основной процесс, внутри которого будет всё происходить
    function loop() {

      if (gameOver === false){
      // Хитрая функция, которая замедляет скорость игры с 60 кадров в секунду до 15 (60/15 = 4)
     req = requestAnimationFrame(loop);
   }
      // Игровой код выполнится только один раз из четырёх, в этом и суть замедления кадров, а пока переменная count меньше четырёх, код выполняться не будет
      if (++count < 4) {
        return;
      }

      // Обнуляем переменную скорости
      count = -5;
      // Очищаем игровое поле
      context.clearRect(0, 0, canvas.width, canvas.height);
      // Двигаем змейку с нужной скоростью
      snake.x += snake.dx;
      snake.y += snake.dy;
      // Если змейка достигла края поля по горизонтали — продолжаем её движение с противоположной строны
      if (snake.x < 0) {
        snake.x = canvas.width - grid;
      }
      else if (snake.x >= canvas.width) {
        snake.x = 0;
      }
      // Делаем то же самое для движения по вертикали
      if (snake.y < 0) {
        snake.y = canvas.height - grid;
      }
      else if (snake.y >= canvas.height) {
        snake.y = 0;
      }
      // Продолжаем двигаться в выбранном направлении. Голова всегда впереди, поэтому добавляем её координаты в начало массива, который отвечает за всю змейку
      snake.cells.unshift({ x: snake.x, y: snake.y });

      // Сразу после этого удаляем последний элемент из массива змейки, потому что она движется и постоянно освобождает клетки после себя
      if (snake.cells.length > snake.maxCells) {
        snake.cells.pop();
      }
      // Рисуем еду — красное яблоко
      context.fillStyle = 'red';
      context.fillRect(apple.x, apple.y, grid - 1, grid - 1);
      // Одно движение змейки — один новый нарисованный квадратик 
      context.fillStyle = 'green';

      // Обрабатываем каждый элемент змейки
      snake.cells.forEach(function (cell, index) {
        // Чтобы создать эффект клеточек, делаем зелёные квадратики меньше на один пиксель, чтобы вокруг них образовалась чёрная граница
        context.fillRect(cell.x, cell.y, grid - 1, grid - 1);
        // Если змейка добралась до яблока...
        if (cell.x === apple.x && cell.y === apple.y) {
          // увеличиваем длину змейки

          
  
          snake.maxCells++;
          // Рисуем новое яблочко
          // Помним, что размер холста у нас 500x500, при этом он разбит на ячейки — 25 в каждую сторону
          apple.x = getRandomInt(0, 20) * grid;
          apple.y = getRandomInt(0, 20) * grid;
          
          score++;
          document.getElementById("score").innerHTML = score;

        }

        // Проверяем, не столкнулась ли змея сама с собой
        // Для этого перебираем весь массив и смотрим, есть ли у нас в массиве змейки две клетки с одинаковыми координатами 
        for (var i = index + 1; i < snake.cells.length; i++) {
          // Если такие клетки есть — начинаем игру заново
          
          if (cell.x === snake.cells[i].x && cell.y === snake.cells[i].y) {
           context.clearRect(0,0, canvas.width, canvas.height);
            return showGameOver(req);
            // Задаём стартовые параметры основным переменным
             snake.x = getRandomInt(0, 20) * grid;
            snake.y = getRandomInt(0, 20) * grid;
            snake.cells = [];
            snake.maxCells = 4;
            snake.dx = grid;
            snake.dy = 0;
            // Ставим яблочко в случайное место
            apple.x = getRandomInt(0, 20) * grid;
            apple.y = getRandomInt(0, 20) * grid;
            
            score = 0;
            document.getElementById("score").innerHTML = score;
            
                  
            
          }
        }
        
         document.getElementById("record").innerHTML = record;
             if(score>record){
                record = score;
               localStorage.record = record;
               localStorage.nick = nick;
             }
           
                
               
      });
    }
  

    // Смотрим, какие нажимаются клавиши, и реагируем на них нужным образом
    document.addEventListener('keydown', function (e) {
      // Дополнительно проверяем такой момент: если змейка движется, например, влево, то ещё одно нажатие влево или вправо ничего не поменяет — змейка продолжит двигаться в ту же сторону, что и раньше. Это сделано для того, чтобы не разворачивать весь массив со змейкой на лету и не усложнять код игры.
      // Стрелка влево
      // Если нажата стрелка влево, и при этом змейка никуда не движется по горизонтали…
      if ((e.which === 37 || e.which === 65) && snake.dx === 0) {
        // то даём ей движение по горизонтали, влево, а вертикальное — останавливаем
        // Та же самая логика будет и в остальных кнопках
        snake.dx = -grid;
        snake.dy = 0;
      }
      // Стрелка вверх
      else if ((e.which === 38 || e.which === 87) && snake.dy === 0) {
        snake.dy = -grid;
        snake.dx = 0;
      }
      // Стрелка вправо
      else if ((e.which === 39 || e.which === 68) && snake.dx === 0) {
        snake.dx = grid;
        snake.dy = 0;
      }
      // Стрелка вниз
      else if ((e.which === 40 || e.which === 83) && snake.dy === 0) {
        snake.dy = grid;
        snake.dx = 0;
      }
    });

     function showGameOver(){

      cancelAnimationFrame(req);

        gameOver = true;

      
        context.fillStyle = 'black';
        context.globalAlpha = 0.75;
        context.fillRect(0, canvas.height / 2 - 30, canvas.width, 60);
        // пишем надпись моноширинным шрифтом по центру
        context.fillStyle = '#DEB887';
        context.globalAlpha = 1;       
        context.font = '30px monospace';
        context.textAlign = 'center';
        context.textBaseline = 'middle';        
        context.fillText('Вы проиграли!', canvas.width / 2, canvas.height / 2 - 25);
        context.fillText('Нажмите Enter для продолжения', canvas.width / 2, canvas.height / 2 + 25); 
        
    
    const user = {
      "nick":nick,
      "record":record
    }
    let currentUser
    if(users.find(el=>el.nick===user.nick)){
      currentUser = users.find(el=>el.nick === user.nick)
      console.log(currentUser)
    }
    if(users.find(el=>el.nick === user.nick)){
      console.log("User найден")
    
    
   


    //если игрок бьет свой рекорд, заменяем только очки, если игрока нет в таблице, то и имя и счет вносятся в таблицу
    if(user.record>currentUser.record){
      console.log("Текущий счет бьет рекорд")
      const numberOfCurrentUserAtArray = users.indexOf(currentUser)
      users.splice(numberOfCurrentUserAtArray, 1)
      users.push(user)
      localStorage.setItem('users', JSON.stringify(users))
     
    }
    RedrawUsersScoreList()
  } else{
    console.log('User не найден')
    users.push(user)
    localStorage.setItem('users', JSON.stringify(users))
    RedrawUsersScoreList()
  }
}




    document.addEventListener('keydown', function (restart){
       if (restart.which === 13 && gameOver === true) {
        gameOver = false;
        window.location.reload();
         
       }
    })
    // Запускаем игру
          req = requestAnimationFrame(loop);

</script>
</html>