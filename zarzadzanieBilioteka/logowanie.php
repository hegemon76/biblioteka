<?php
include '../baza/polaczenie.php';
//logowanko 
if (isset($_POST['loginForm'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $uname = mysqli_real_escape_string($connect, $_POST['login']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        if ($uname != "" && $password != "") {

            $sql_query = "select count(*) as cntUser from administratorzy where login='" . $uname . "' and haslo='" . $password . "'";
            $result = mysqli_query($connect, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if ($count > 0) {
                $_SESSION['uname'] = $uname;
                header('Location: http://localhost:8000/strona.php');
                exit();
            } 
        } else {
            $_SESSION['error'] = 1;
        }
        header('Location: http://localhost:8000/php/logowanie.php');
                exit();

    }else {
        $_SESSION['error'] = 1;
    }
}else {
    $_SESSION['error'] = 1;
    header('Location : http://localhost:8000/strona.php');
    exit();
}