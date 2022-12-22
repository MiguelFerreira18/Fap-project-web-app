<!---inicio do php-->
<?php
include("db.php");
if (isset($_POST["submit"])) {

    $isPass = false;

    $loginForm_Name = mysqli_real_escape_string($conn, $_POST["name"]);
    $loginForm_password = mysqli_real_escape_string($conn, $_POST["password"]);


    $sql = "SELECT * FROM dbuser"; //query para ir buscar todos o users
    $result = $conn->query($sql); //para query para o php


    //verificar se tem utilizadoes
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if (md5($loginForm_password) == $row["password"] && $loginForm_Name == $row["name"]) {
                $isPass = true;
            }
        }
    }

    if ($isPass) {
        session_start();
        $_SESSION["name"] = $_POST["loginForm_Name"];
        $cookie_name = "user";
        $cookie_value = $loginForm_Name;
        setcookie($cookie_name, $cookie_value, time() + 30000);
        header("Location: index.php?=logged_in");
        exit();
    }
}
header("Location: index.php?=WrongData");
exit();