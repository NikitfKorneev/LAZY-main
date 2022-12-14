<?php
include "db.php"; // Подключение к БД 
$id = $_GET['id'];
$sql = "SELECT * FROM `HISTORY_TABLE` WHERE DEVICE_ID = '$id'";
?>

<?php
 $sql_user = mysqli_query($mysql, "SELECT USER_ID FROM `DEVICE_TABLE` WHERE DEVICE_ID = '$id'");
        if($name = mysqli_fetch_assoc($sql_user)){
?>


<?php   $name['USER_ID'];
$sql_id_user = $name['USER_ID']
?>

<?php
}
 ?>
 
 
<?php
if($result = $mysql->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo '<!DOCTYPE HTML>
    <html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>MyApp</title>
    <script src="UpdateScript.js"> </script>
    <script src="update_counter.js"> </script>
    <link rel="manifest" href = "site.webmanifest">
    <link rel="stylesheet" href = "index.css">
    </head>
    <body>
    <div class = "div_history">
    <p>Количество объектов: '.$rowsCount.'</p>';

    echo '<table><tr><th>USER_ID</th><th>DEVICE_ID</th><th>NAME</th><th>OUT_STATE</th><th>DATE_TIME</th></tr>';
    foreach($result as $row){
        echo '<tr>';
            echo '<td>' . $row["USER_ID"] . '</td>';
            echo '<td>' . $row["DEVICE_ID"] . '</td>';
            echo '<td>' . $row["NAME"] . '</td>';
            echo '<td>' . $row["OUT_STATE"] . '</td>';
            echo '<td>' . $row["DATE_TIME"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    $result->free();
}

echo'<form method=POST action = "http://lazy:3006/main.php?id='.$sql_id_user.'">
<button formmethod=POST name=1 value=1 class = "button_main"">Назад</button>
</form><br></div>';
echo'
    </body>
    </html>';
?>