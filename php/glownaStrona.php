<!doctype html>
<html lang="PL-pl">

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
    <div class="container mt-5">
        <div class="card-deck">
            <div class="col col-4">
                <div class="card text-center border-info" style="width: 18rem;">
                    <img src="../zdjecia/ksiazka.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ksiazki</h5>
                        <p class="card-text">Po kliknięciu zostaniesz przekierowany do sekcji edycji</p>
                        <a href="../php/ksiazkiAdmin.php" class="btn btn-primary">Przejdź do edycji tabel</a>
                    </div>
                </div>
            </div>

            <div class="col col-4">
                <div class="card text-center border-info" style="width: 18rem;">
                    <img src="../zdjecia/2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Klienci</h5>
                        <p class="card-text">Po kliknięciu zostaniesz przekierowany do sekcji edycji</p>
                        <a href="../php/uzytkownicyAdmin.php" class="btn btn-primary">Przejdź do edycji tabel</a>
                    </div>
                </div>
            </div>

            <div class="col col-4">
                <div class="card text-center border-info" style="width: 18rem;">
                    <img src="../zdjecia/order.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Wypozyczenia</h5>
                        <p class="card-text">Po kliknięciu zostaniesz przekierowany do sekcji wypozyczen</p>
                        <a href="../php/wypozyczenia.php" class="btn btn-primary">Przejdź do edycji tabel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>