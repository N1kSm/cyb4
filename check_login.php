<?php

session_start();

$user = $_REQUEST["txtUser"];
$pwd = $_REQUEST["txtPwd"];
$hash = hash("sha256", $pwd);
// if($hash == "8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92"){
//     echo "<h1>Привет, $user</h1>";
// }
// else{
//     echo "<h2>Извините, неверный пароль!</h2>";
// }

//Здесь нарушены все нормы безопасности:
//1.Слабый пароль
//2. Нарушен прицип наименьших привилегий
//3. Секрет в коде
//$conn = mysqli_connect("localhost:3306","root","","cyb4");

//4. Уязвимость для SQL Injection
//SQL Injection   ' or 1 or'  -- , при введении данных значений - мы обходим авторизацию
//$sql = "SELECT * FROM users WHERE Login='$user' AND PwdHash='$hash'";
// $query = mysqli_query($conn, $sql);
// $result = mysqli_fetch_all($query);
//echo $result;
//var_dump($result);
// $numRows = count($result);
//echo($numRows);

// Устраняем Секрет в коде
// Тем самым, проблема слабого пароля и превышенного логина делегируется админу произв сервера
$server = getenv("cyb4_db_server");
$login = getenv("cyb4_db_user");
$pwd = trim(getenv("cyb4_db_pwd"));
$conn = mysqli_connect($server,$login,$pwd,"cyb4");


// Устраняем Уязвимость для SQL Injection
$sql = "SELECT * FROM users WHERE Login=? AND PwdHash=?";
$stat =  mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stat, "ss", $user, $hash);
mysqli_stmt_execute($stat);
$result = mysqli_stmt_get_result($stat);
$numRows = mysqli_num_rows($result);


if ($numRows == 0){
    echo "<h2>Извините, неверный логин или пароль!</h2>";
}
else{
    echo "<h1>Привет, $user</h1>";
    $_SESSION["user"] = $user;
    echo '<a href="index1.html">Домашняя страница</a>';
    
}

mysqli_close($conn);
?>