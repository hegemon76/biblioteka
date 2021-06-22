<?php include '../zarzadzanieBilioteka/wypozyczenia.php'; ?>

<?php
if (isset($_GET['uzytkownik']) && isset($_GET['zamowienie']) && isset($_GET['ksiazka'])) {
    $idKlienta = $_GET['uzytkownik'];
    $idZamowienia = $_GET['zamowienie'];
    $idKsiazki = $_GET['ksiazka'];
    $update = true;

    $user = mysqli_query($connect, "SELECT * FROM klienci WHERE idklienta=$idKlienta");
    $order = mysqli_query($connect, "SELECT * FROM zamowienia WHERE idwypozyczenia=$idWypozyczenia");
    $book = mysqli_query($connect, "SELECT * FROM ksiazki WHERE idksiazki=$idKsiazki");

    $usrCount = mysqli_query($connect, "SELECT count(*) usrCount FROM `klienci` WHERE idklienta=$idKlienta");
    $row = mysqli_fetch_array($usrCount, MYSQLI_ASSOC);

    $orderCount = mysqli_query($connect, "SELECT count(*) orderCount FROM `zamowienia` WHERE idwypozyczenia=$idWypozyczenia");
    $row1 = mysqli_fetch_array($orderCount, MYSQLI_ASSOC);

    $bookCount = mysqli_query($connect, "SELECT count(*) bookCount FROM `ksiazki` WHERE idksiazki=$idKsiazki");
    $row3 = mysqli_fetch_array($bookCount, MYSQLI_ASSOC);

    //sprawdza czy istnieje zamowienie
    if ($row1['orderCount']  == 1 and $row['usrCount'] == 1 and $row3['bookCount'] == 1) {
        $u = mysqli_fetch_array($user);
        $o = mysqli_fetch_array($order);
        $b = mysqli_fetch_array($book);
        $imie = $u['imie'];
        $nazwisko = $u['nazwisko'];
        $miejscowosc = $u['miejscowosc'];
        $imieAutora = $b['imieautora'];
        $nazwiskoAutora = $b['nazwiskoautora'];
        $tytul = $b['tytul'];
        $wypozyczona = $b['wypozyczona'];
        $dataZamowienia = $o['data'];
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Uzytkownicy</title>
</head>

<body>

    <!-- nav -->
    <?php include '../nav.php'; ?>
    <!-- end nav -->

    <div class="container col-10">
        <h1 class="text-center">Tabela wypozyczen</h1>
        <?php $results = mysqli_query($connect, "SELECT * FROM zamowienia as z inner join klienci k on z.idklienta = k.idklienta inner join ksiazki b on z.idksiazki = b.idksiazki;"); ?>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col">Imie i nazwisko</th>
                    <th scope="col">Miejscowosc</th>
                    <th scope="col">Imie i nazwisko autora</th>
                    <th scope="col">Tytul</th>
                    <th scope="col">Cena</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <th scope="row">
                        <?php echo $row['idzamowienia']; ?> </th>
                    <td>
                        <?php echo $row['status']; ?> </td>
                    <td>
                        <?php echo $row['imie'] . ' ' . $row['nazwisko']; ?> </td>
                    <td>
                        <?php echo $row['miejscowosc']; ?> </td>
                    <td>
                        <?php echo $row['imieautora'] . ' ' . $row['nazwiskoautora']; ?> </td>
                    <td>
                        <?php echo $row['tytul']; ?> </td>
                    <td>
                        <?php echo $row['cena']; ?> </td>
                    <td>
                        <a class="btn btn-primary" href="http://localhost:8000/php/wypozyczenia.php?uzytkownik=<?php echo $row['idklienta']; ?>&zamowienie=<?php echo $row['idzamowienia']; ?>&ksiazka=<?php echo $row['idksiazki']; ?> ">Edytuj</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="http://localhost:8000/php/wyzpozyczenia.php?del=<?php echo $row['idzamowienia']; ?>">Usuń</a>
                    </td>
                </tr>
                <?php } ?>
        </table>
        <form action="../zarzadzanieBilioteka/wypozyczenia.php" method="POST">
            <div class="form-row justify-content-center">
                <!-- ksiazki -->
                <!-- wyswietlanie przy edycji -->
                <?php if ($update == true) : ?>
                <!-- klienci -->
                <div class="col-4">
                    <input type="hidden" name="idKlienta" value="<?php echo $idKlienta; ?>">
                    <div class="form-group ">
                        <label class="col-form-label">Imię klienta</label>
                        <input type="text" class="form-control" name="imieKlienta" placeholder="Imię klienta" value="<?php echo $imie; ?>">
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label">Nazwisko klienta</label>
                        <input type="text" class="form-control" name="nazwiskoKlienta" placeholder="Nazwisko klienta" value="<?php echo $nazwisko; ?>">
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label">Miejscowosc</label>
                        <input type="text" class="form-control" name="miejscowosc" placeholder="Miejscowosc" value="<?php echo $miejscowosc; ?>">
                    </div>
                </div>
                <?php endif ?>
                <!-- zamowienia -->
                <div class="col-4">
                    <input type="hidden" name="idZamowienia" value="<?php echo $idZamowienia; ?>">
                    <?php if ($idZamowienia != 0) : ?>
                    <div class="form-group">
                        <label class="col-form-label">Nr zamowienia</label>
                        <input type="text" readonly class="form-control-plaintext" name="idzamowienia" placeholder="Nr zamowienia" value="<?php echo $idZamowienia; ?>">
                    </div>
                    <?php endif ?>
                    <!-- wybor klienta do zamowienia -->
                    <?php if ($update == false) : ?>
                    <div class="mt-2">
                        <?php $results = mysqli_query($connect, "SELECT * FROM klienci;"); ?>
                        <select name="wybranyKlient" class="custom-select">
                                <option selected>Wybierz użytkownika</option>
                                <?php while ($row = mysqli_fetch_array($results)) { ?>
                                    <option value="<?php echo $row['idklienta']; ?>"><?php echo $row['imie'] . " " . $row['nazwisko']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <!-- wybor ksiazki do zamowineia -->
                    <div class="mt-2">
                        <?php $results = mysqli_query($connect, "SELECT * FROM ksiazki;"); ?>
                        <select name="wybranaKsiazka" class="custom-select">
                                <option selected>Wybierz ksiazke</option>
                                <?php while ($row = mysqli_fetch_array($results)) { ?>
                                    <option value="<?php echo $row['idksiazki']; ?>"> <?php echo $row['tytul']; ?> </option>
                                <?php } ?>
                            </select>
                    </div>
                    <?php endif ?>
                    <div class="form-group ">
                        <label class="col-form-label">Data zamowienia</label>
                        <input type="text" readonly class="form-control" name="dataZamowienia" placeholder="Data zamowienia" value="<?php echo $dataZamowienia; ?>">
                    </div>
                    <div class="form-grup">
                        <label class="col-form-label">Status zamówienia</label>
                        <select name="statusZamowienia" class="custom-select">
                            <option value="Oczekiwanie">Oczekiwanie</option>
                            <option value="Wysłano">Wysłano</option>
                            <option value="W przygotowaniu">W przygotowaniu</option>
                        </select>
                    </div>
                </div>
                <!-- koniec zamowien -->
            </div>
            <!-- wyswietlanie ksaizek przy edycji -->
            <?php if ($update == true) : ?>
            <div class="form-row justify-content-around">
                <div class="form-group col-8">
                    <?php $results = mysqli_query($connect, "SELECT * FROM ksiazki;"); ?>
                    <select name="wybranaKsiazka" class="custom-select">
                            <option value="<?php echo $idKsiazki ; ?>" selected><?php echo $tytul; ?></option>
                            <?php while ($row = mysqli_fetch_array($results)) { ?>
                                <option value="<?php echo $row['idksiazki']; ?>"><?php echo $row['tytul']; ?></option>
                            <?php } ?>
                        </select>
                </div>
            </div>
            <?php endif ?>

            <div class="mt-3 mb-5">
                <?php if ($update == true) : ?>
                <button class="btn btn-primary col-2 offset-5" type="submit" name="update">Edytuj</button>
                <?php else : ?>
                <button class="btn btn-primary col-2 offset-5" type="submit" name="save">Dodaj</button>
                <?php endif ?>
            </div>
        </form>
    </div>
</body>
