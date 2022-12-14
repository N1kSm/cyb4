<html>
<head>
    <title>Логин</title>
    <meta charset="UTF-8" />
    <style>
        input, button {
            width: 150px;
            margin: 3px;
            text-align: center;
        }

    </style>
   
</head>
    <body>
    <a href="index1.html">Домашняя страница</a>
    <h1>Введите свой логин и пароль</h1>
    <form method="POST" action="check_login.php">
        <label>Login</label><br />
        <input type="text" name="txtUser"/> <br />
        <label>Password</label><br />
        <input type="password" name="txtPwd"/> <br />
        <button>Вперед</button> <br />
    </form>
    </body>
</html>