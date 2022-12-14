<html>
	<head>
  <script>
    function add_user() {
       
        const username = document.getElementById("user").value;
        const password = document.getElementById("pwd").value;
        const eml = document.getElementById("email").value;
        const url = "api/do_register.php?user=" + username + "&pwd=" + password + "&email=" +eml;
       
       fetch(url)
       setTimeout(() => {window.location.href = 'login.php'},2000)
       document.getElementById("btn1").innerHTML = "ОК";
       alert('Пользователь зарегестрирован. Вы будете перенаправлены на страницу входа')

      }

</script>

</head>			
<body>

<h1>Регистрация нового пользователя</h1>

<label>Ваш логин</label><br />
<input id="user" /> <br />
<label>Ваш пароль</label><br />
<input id="pwd" type="password"/> <br />
<label>Ваш email</label><br />
<input id="email" /> <br />
<button id="btn1" onclick="add_user();">Зарегистрироваться!</button>


</body>

<p style="position:absolute;right:50;bottom:10;margin-bottom:10">Автор: Никита Смирнов </p>
</html>