<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Księgarnia</title>
</head>

<body>
    <?php include '../nav.php'; ?>

    <div class="container">
        <h6 class="text-center mt-3">
            <?php
            if (isset($_SESSION['error'])) {
                echo "Nie udało się zalogować";
                unset($_SESSION['error']);
            }
            ?>
        </h6>

        <div class="container">
            <h1 class="text-center">Zaloguj się!</h1>
            <form action="../zarzadzanieBilioteka/logowanie.php" method="POST">
                <div class="form-group mb-3 col-4 offset-4">
                    <label class="col-form-label">Login</label>
                    <input type="text" class="form-control" name="login" placeholder="Tutaj wpisz swój login">
                </div>
                <div class="form-group mb-3 col-4 offset-4">
                    <label class="col-form-label">Hasło</label>
                    <input type="password" class="form-control" name="password" placeholder="Tutaj wpisz swoje hasło">
                </div>
                <div class="mt-1">
                    <button name="loginForm" type="submit" class="btn btn-primary col-2 offset-5">Zaloguj się</button>
                </div>
            </form>
        </div>
    </div>
</body>