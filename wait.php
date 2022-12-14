<!DOCTYPE HTML>
    <html>
    <!DOCTYPE HTML>
    <html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>MyApp</title>
    <script src="UpdateScript.js"> </script>
    <script src="update_counter.js"> </script>
    <link rel="manifest" href = "site.webmanifest">
    <link rel="stylesheet" href = "index.css">
    </head>
    <body><div class = "div_history">
        <h1> Отдохните </h1>
        <p> Если отдохнули, то нажмите на кнопку "Вернуться" </p>
        <a href="<?php	// начинаем первый PHP скрипт
      $link='http://lazy:3006/';	// переменная с адресом ссылки
      $current_page=true;	// переменная, определяющая активность пункта меню
      echo $link;	// выводим адрес ссылки
      ?>"><?php	// начинаем второй PHP скрипт
      if( $current_page )	// если пункт меню активный
      echo ' '; // выводим соответствующий класс 
      echo $name;	// выводим текст ссылки
      ?><button  class = "button_main">Вернуться</button></a></div>
    </body>
    </html>