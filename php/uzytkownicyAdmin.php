<?php include '../zarzadzanieBilioteka/uzytkownicy.php'; ?>

<?php
//jezeli chcesz edytowac
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($connect, "SELECT * FROM klienci WHERE idklienta=$id");
    $count = mysqli_query($connect, "SELECT count(*) cnt FROM `klienci` WHERE idklienta=1");
    $count = mysqli_query($connect, "SELECT count(*) cnt FROM `ksiazki` WHERE idksiazki=1");
    $row = mysqli_fetch_array($count, MYSQLI_ASSOC);


    if ($row['cnt'] == 1) {
        $n = mysqli_fetch_array($record);
        $imie = $n['imie'];
        $nazwisko = $n['nazwisko'];
        $miejscowosc = $n['miejscowosc'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Klienci</title>
</head>

<body>

    <!-- nav -->
    <?php include '../nav.php'; ?>
    <!-- end nav -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <div class="">
        <h1>Tabela Klientów</h1>
        <?php $results = mysqli_query($connect, "SELECT * FROM klienci"); ?>
        <table class="">
            <thead>
                <tr>
                    <th scope="">#</th>
                    <th scope="">Imie</th>
                    <th scope="">Nazwisko</th>
                    <th scope="">Miejscowosc</th>
                    <th scope=""></th>
                    <th scope=""></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <th scope="row"> <?php echo $row['idklienta']; ?> </th>
                        <td> <?php echo $row['imie']; ?> </td>
                        <td> <?php echo $row['nazwisko']; ?> </td>
                        <td> <?php echo $row['miejscowosc']; ?> </td>
                        <td>
                            <a class="" href="http://localhost:8000/php/uzytkownicyadmin.php?edit=<?php echo $row['idklienta']; ?>">Edytuj</a>
                        </td>
                        <td>
                            <a class="" href="http://localhost:8000/php/uzytkownicyadmin.php?del=<?php echo $row['idklienta']; ?>">Usuń</a>
                        </td>
                    </tr>
                <?php } ?>
        </table>
        <form action="../zarzadzanieBilioteka/uzytkownicy.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="">
                <label class="">Imię klienta</label>
                <input type="text" class="" name="imie" placeholder="Imię klienta" value="<?php echo $imie; ?>">
            </div>
            <div class="">
                <label class="">Nazwisko klienta</label>
                <input type="text" class="" name="nazwisko" placeholder="Nazwisko klienta" value="<?php echo $nazwisko; ?>">
            </div>
            <div class="">
                <label class="">Miejscowosc</label>
                <input type="text" class="" name="miejscowosc" placeholder="Miejscowsc" value="<?php echo $miejscowosc; ?>">
            </div>
            <div class="">
                <?php if ($update == true) : ?>
                    <button class="" type="submit" name="update">Edytuj</button>
                <?php else : ?>
                    <button class="" type="submit" name="save">Zapisz</button>
                <?php endif ?>
            </div>
        </form>
    </div>


</body>