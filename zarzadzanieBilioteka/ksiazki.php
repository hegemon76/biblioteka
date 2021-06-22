<?php
$connect = mysqli_connect('localhost', 'root', '', 'bd-wsb');

$id = 0;
$imie = "";
$nazwisko = "";
$tytul = "";
$cena = 0;
$update = false;
//dodawania
if (isset($_POST['save'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $tytul = $_POST['tytul'];
    $cena = $_POST['cena'];

    mysqli_query($connect, "INSERT INTO ksiazki (imieautora, nazwiskoautora, tytul, cena) VALUES ('$imie', '$nazwisko', '$tytul', '$cena')");
    $_SESSION['message'] = "Dodano ksiazke";
    header('location: http://localhost:8000/php/ksiazkiadmin.php');
    exit();
}
//edycja
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $tytul = $_POST['tytul'];
    $cena = $_POST['cena'];

    mysqli_query($connect, "UPDATE ksiazki SET imieautora='$imie', nazwiskoautora='$nazwisko', tytul='$tytul', cena='$cena' WHERE idksiazki='$id' ");
    $_SESSION['message'] = "Zmodyfikowano ksiazke";
    header('location: http://localhost:8000/php/ksiazkiadmin.php');
    exit();
}
//usuwanie 
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($connect, "DELETE FROM ksiazki WHERE idksiazki=$id");
    $_SESSION['message'] = "Usunieto ksiazke";
    header('location: http://localhost:8000/php/ksiazkiadmin.php');
    exit();
}