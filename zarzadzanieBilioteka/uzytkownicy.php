<?php
$connect = mysqli_connect('localhost', 'root', '', 'bd-wsb');

$id = 0;
$imie = "";
$nazwisko = "";
$miejscowosc = "";
$update = false;
//dodawanie 
if (isset($_POST['save'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $miejscowosc = $_POST['miejscowosc'];

    mysqli_query($connect, "INSERT INTO klienci (imie, nazwisko, miejscowosc) VALUES ('$imie', '$nazwisko', '$miejscowosc')");
    $_SESSION['message'] = "Dodano klienta";
    header('location: http://localhost:8000/php/uzytkownicyadmin.php');
    exit();
}
//edycja
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $miejscowosc = $_POST['miejscowosc'];

    mysqli_query($connect, "UPDATE klienci SET imie='$imie', nazwisko='$nazwisko', miejscowosc='$miejscowosc' WHERE idklienta='$id' ");
    $_SESSION['message'] = "Zaaktualizowano";
    header('location: http://localhost:8000/php/uzytkownicyadmin.php');
    exit();
}
//usuwannie
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($connect, "DELETE FROM klienci WHERE idklienta=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: http://localhost:8000/php/uzytkownicyadmin.php');
    exit();
}
