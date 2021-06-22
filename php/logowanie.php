<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Księgarnia</title>
</head>

<body>
    <?php include '../nav.php'; ?>

    <div class="">
        <h6 class="">
            <?php
            if (isset($_SESSION['error'])) {
                echo "Nie udało się zalogować";
                unset($_SESSION['error']);
            }
            ?>
        </h6>

        <div class="">
            <h1 class="">Zaloguj się!</h1>
            <form action="../zarzadzanieBilioteka/logowanie.php" method="POST">
                <div class="">
                    <label class="">Login</label>
                    <input type="text" class="" name="login" placeholder="Tutaj wpisz swój login">
                </div>
                <div class="">
                    <label class="">Hasło</label>
                    <input type="password" class="" name="password" placeholder="Tutaj wpisz swoje hasło">
                </div>
                <div class="">
                    <button name="loginForm" type="submit" class="">Zaloguj się</button>
                </div>
            </form>
        </div>
    </div>
</body>