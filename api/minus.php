<?php

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x - $y;
sleep(1);
//Здесь нарушены все нормы безопасности:
//1.Слабый пароль
//2. Нарушен прицип наименьших привилегий
//3. Секрет в коде
//$conn = mysqli_connect("localhost:3306","root","","cyb4");
$server = getenv("cyb4_db_server");
$login = getenv("cyb4_db_user");
$pwd = trim(getenv("cyb4_db_pwd"));
$conn = mysqli_connect($server,$login,$pwd,"cyb4");


//4. Уязвимость для SQL Injection
$sql = "INSERT INTO Calcs(Num1,Num2,User) VALUES($x,$y,'Anonym')";
mysqli_query($conn, $sql);
mysqli_close($conn);

echo $z;

