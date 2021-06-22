<?php
$connect = mysqli_connect('localhost', 'root', '', 'bd-wsb');

$idKlienta = 0;
$idKsiazki = 0;
$idZamowienia = 0;
$imie = "";
$nazwisko = "";
$miejscowosc = "";
$status = "";
$imieAutora = "";
$nazwiskoAutora = "";
$tytul = "";
$cena = 0;
$dataZamowienia = date("d.m.y");
$update = false;

//polecenie sql do wprowadzenia nowego zamówienia

if (isset($_POST['save'])) {
    $idKlienta = $_POST['wybranyKlient'];
    $idKsiazki = $_POST['wybranaKsiazka'];
    $status = $_POST['statusZamowienia'];
    $dataZamowienia = $_POST['dataZamowienia'];
    $dataText = "data";
    $statusText = "status";

    mysqli_query($connect, "INSERT INTO zamowienia (idklienta, idksiazki, $dataText, $statusText) VALUES ('$idKlienta', '$idKsiazki','$dataZamowienia' ,'$status')");
    $_SESSION['message'] = "Dodano klienta";
    header('location: http://localhost:8000/php/wypozyczenia.php');
    exit();
}

if (isset($_POST['update'])) {
    // klient
    $idKlienta = $_POST['idKlienta'];
    $imie = $_POST['imieKlienta'];
    $nazwisko = $_POST['nazwiskoKlienta'];
    $miejscowosc = $_POST['miejscowosc'];
    //ksiazka
    $idKsiazki = $_POST['wybranaKsiazka'];
    //zamówienie 
    $idZamowienia = $_POST['idZamowienia'];
    $status = $_POST['statusZamowienia'];
    $dataZamowienia = $_POST['dataZamowienia'];
    $statusText = "status";

//polecenie sql do edyji danych zamówienia
    mysqli_query($connect, "UPDATE klienci SET imie='$imie', nazwisko='$nazwisko', miejscowosc='$miejscowosc' WHERE idklienta='$idKlienta' ");
    mysqli_query($connect, "UPDATE zamowienia SET idklienta='$idKlienta', idKsiazki='$idKsiazki', $statusText='$status' WHERE idZamowienia='$idZamowienia' ");
    $_SESSION['message'] = "Address updated!";
    header('location: http://localhost:8000/php/wypozyczenia.php');
    exit();
}
//polecenie do usunięcia zamówienia
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($connect, "DELETE FROM zamowienia WHERE idzamowienia=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: http://localhost:8000/php/wypozyczenia.php');
    exit();
}
