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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

    <div class="container">
        <h1>Tabela Książek</h1>
        <?php $results = mysqli_query($connect, "SELECT * FROM ksiazki order by idksiazki;"); ?>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imie</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Tytul</th>
                    <th scope="col">Cena</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                            <a class="btn btn-primary" href="http://localhost:8000/zarzadzanieBiblioteka/ksiazkiadmin.php?edit=<?php echo $row['idksiazki']; ?>">Edytuj</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="http://localhost:8000/zarzadzanieBiblioteka/ksiazkiadmin.php?del=<?php echo $row['idksiazki']; ?>">Usuń</a>
                        </td>
                    </tr>
                <?php } ?>
        </table>
        <form action="../zarzadzanieBilioteka/ksiazki.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group col-4 offset-4">
            <h1>Dodawanie</h1>
                <label class="col-form-label">Imię autora</label>
                <input type="text" class="form-control" name="imie" placeholder="Imię autora" value="<?php echo $imie; ?>">
            </div>
            <div class="form-group col-4 offset-4">
                <label class="col-form-label">Nazwisko autora</label>
                <input type="text" class="form-control" name="nazwisko" placeholder="Nazwisko autora" value="<?php echo $nazwisko; ?>">
            </div>
            <div class="form-group col-4 offset-4">
                <label class="col-form-label">Tytuł</label>
                <input type="text" class="form-control" name="tytul" placeholder="Tytuł" value="<?php echo $tytul; ?>">
            </div>
            <div class="form-group col-4 offset-4">
                <label class="col-form-label">Cena</label>
                <input type="number"step="0.01" min="1"  class="form-control" name="cena" placeholder="Cena" value="<?php echo $cena; ?>">
            </div>
            <div class="mt-3 mb-5">
                <?php if ($update == true) : ?>
                    <button class="btn btn-primary col-2 offset-5" type="submit" name="update">Edytuj</button>
                <?php else : ?>
                    <button class="btn btn-primary col-2 offset-5" type="submit" name="save">Zapisz</button>
                <?php endif ?>
            </div>
        </form>
    </div>


</body>