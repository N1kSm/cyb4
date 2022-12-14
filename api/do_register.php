<?php



    session_start();
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            $user = $_REQUEST["user"];
            $pwd = $_REQUEST["pwd"];
            $email = $_REQUEST["email"];
            $hash = hash('sha256',$pwd);
           
            $server = getenv("cyb4_db_server");
            $login = getenv("cyb4_db_user");
            $pwd = trim(getenv("cyb4_db_pwd"));
            $conn = mysqli_connect($server,$login,$pwd,"cyb4");
                        
            $sql = "INSERT INTO users(Login,PwdHash,Email) VALUES('$user', '$hash','$email')";
        
            $result =  mysqli_query($conn,$sql);
            if ($result) {
            http_response_code(200);
            }
           echo(mysqli_error($conn));
            
            mysqli_close($conn);

          echo("OK")
        ?>
    </body>
</html>