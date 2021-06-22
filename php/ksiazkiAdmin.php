<?php include '../zarzadzanieBilioteka/ksiazki.php'; ?>

<?php
//jezeli chcesz edytowac
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($connect, "SELECT * FROM ksiazki WHERE idksiazki=$id");
    $count = mysqli_query($connect, "SELECT count(*) cnt FROM `ksiazki` WHERE idksiazki=1");
    $row = mysqli_fetch_array($count, MYSQLI_ASSOC);

    if ($row['cnt'] == 1) {
        $n = mysqli_fetch_array($record);
        $imie = $n['imieautora'];
        $nazwisko = $n['nazwiskoautora'];
        $tytul = $n['tytul'];
        $cena = $n['cena'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <title>Biblioteka</title>
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
        <h1>Tabela Książek</h1>
        <?php $results = mysqli_query($connect, "SELECT * FROM ksiazki order by idksiazki;"); ?>
        <table class="">
            <thead>
                <tr>
                    <th scope="">#</th>
                    <th scope="">Imie</th>
                    <th scope="">Nazwisko</th>
                    <th scope="">Tytul</th>
                    <th scope="">Cena</th>
                    <th scope=""></th>
                    <th scope=""></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <th scope="row"> <?php echo $row['idksiazki']; ?> </th>
                        <td> <?php echo $row['imieautora']; ?> </td>
                        <td> <?php echo $row['nazwiskoautora']; ?> </td>
                        <td> <?php echo $row['tytul']; ?> </td>
                        <td> <?php echo $row['cena']; ?> </td>
                        <td>
                            <a class="" href="http://localhost:8000/zarzadzanieBiblioteka/ksiazkiadmin.php?edit=<?php echo $row['idksiazki']; ?>">Edytuj</a>
                        </td>
                        <td>
                            <a class="" href="http://localhost:8000/zarzadzanieBiblioteka/ksiazkiadmin.php?del=<?php echo $row['idksiazki']; ?>">Usuń</a>
                        </td>
                    </tr>
                <?php } ?>
        </table>
        <form action="../zarzadzanieBilioteka/ksiazki.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="">
            <h1>Dodawanie</h1>
                <label class="">Imię autora</label>
                <input type="text" class="" name="imie" placeholder="Imię autora" value="<?php echo $imie; ?>">
            </div>
            <div class="">
                <label class="">Nazwisko autora</label>
                <input type="text" class="" name="nazwisko" placeholder="Nazwisko autora" value="<?php echo $nazwisko; ?>">
            </div>
            <div class="">
                <label class="">Tytuł</label>
                <input type="text" class="" name="tytul" placeholder="Tytuł" value="<?php echo $tytul; ?>">
            </div>
            <div class="">
                <label class="">Cena</label>
                <input type="number"step="0.01" min="1"  class="" name="cena" placeholder="Cena" value="<?php echo $cena; ?>">
            </div>
            <div class="mt-3 mb-5">
                <?php if ($update == true) : ?>
                    <button class="" type="submit" name="update">Edytuj</button>
                <?php else : ?>
                    <button class="" type="submit" name="save">Zapisz</button>
                <?php endif ?>
            </div>
        </form>
    </div>


</body>