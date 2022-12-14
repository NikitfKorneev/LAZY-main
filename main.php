<?php
    include "db.php";// Подключение к БД 
    $user_id = $_GET['id'];
    include "count_id.php"; // Обращению к 
    
//--------------------------Таблица для определенного человека----------------------


$mysql->query("DROP TABLE IF EXISTS user_device;");
$mysql->query("CREATE TEMPORARY TABLE user_device as SELECT * from DEVICE_TABLE as d JOIN USER_TABLE as u ON d.USER_ID = u.ID WHERE d.USER_ID = '$user_id'");
$mysql->query("ALTER table user_device add id_i int primary key auto_increment;");

echo'
    <!DOCTYPE HTML>
    <html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>MyApp</title>
    <script src="UpdateScript.js"> </script>
    <script src="update_counter.js"> </script>
    <link rel="manifest" href = "site.webmanifest">
    <link rel="stylesheet" href = "index.css">
    </head>
    <body>';
    
    for($i = 1; $i <= $count_id; $i++){
        $result = mysqli_query($mysql, "SELECT ud.DEVICE_ID from user_device as ud WHERE ud.id_i = '$i';");
        $Arr = mysqli_fetch_array($result);
        $id = $Arr['DEVICE_ID'];
        
        include "sql.php";
        echo'
        <p >'.$i.'</p>';

        $date_minuta = date("Y-m-d H:i");
        $result = mysqli_query($mysql, "SELECT count(*) as coun from HISTORY_TABLE as h where h.DATE_TIME LIKE('$date_minuta%') and h.DEVICE_ID = '$i';");
        $Arr = mysqli_fetch_array($result);
        $count_click_user = $Arr['coun'];

        if($count_click_user >= 5){
            echo'Вы много раз обращались к этому устройству.<br>
            Рекомендация: отдых от 1 минуты<br>';
        }else{
        echo' <div class = "div_main">
        <table class = "table_main">
        <tr>
        <td width=100px> Устройство:
        </td>
        <td width=238px>'.$device_name.'
        </td>
        </tr>
        </table class = "table_main">
        <table border=1 class = "table_main">
        <tr>
        <td width=100px> Tемпературавыа
        </td>
        <td width=40px>'.$temperature.'
        </td>
        <td width=150px>'.$temperature_dt.'
        </td>
        </tr>
        <tr>
        <td width=100px > Реле
        </td>
        <td width=40px>'.$out_state.'
        </td>
        <td width=150px>'.$out_state_dt.'
        </td>
        </tr>
        </table><br>
        ';
        if($out_state == 0){
            echo'<form method=POST > 
            <button class = "button_main" formmethod=POST name=button_on'.$id.' value=1>Включить реле</button>
            </form><br>';
        }else{
            echo'<form method=POST>
            <button class = "button_main" formmethod=POST name=button_off'.$id.' value=1>Выключить реле</button>
            </form><br>';
        }
        echo'
        <form method=POST>
    <button class = "button_main" formmethod=POST name=button_pr'.$id.' value=1>История</button></div>
    </form><br>
    </div >';
        }
    }
echo'
    </body>
    </html>';

?>