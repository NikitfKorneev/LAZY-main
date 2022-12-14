<?php
    include "db.php"; // Подключение к БД 
    
echo '<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>My App</title>
      <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
      <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <header>
    </header>';

 echo'
    <div class= "div_aut">
    <form action="http://lazy:3006/index.php" method="post">
    <p>Логин: <input type="text" name="name" /></p>
    <p>Пароль: <input type="text" name="password" /></p>
    <p><input class = "button_main"  type="submit" /></p>
   </form>
    </div>';

    echo'
  </body>
  </html>';
  ?>

<?php
 $name = $_POST['name'];
 $password = $_POST['password'];
 $result = mysqli_query($mysql, "SELECT ID FROM `USER_TABLE` WHERE USER_NAME ='$name' AND PASSWORD = '$password'");
        if($name = mysqli_fetch_assoc($result)){
?>

<?php  $name['ID'];
 $id = $name['ID']
 ?>
 
<?php
Header("Location:main.php?id=$id");
?>
<?php
}
 ?>