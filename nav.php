<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
echo '<a class="navbar-brand" href="http://localhost:8000/gllowna.php">Aplikacja Baza Danych</a>';
echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse justify-content-left" id="navbarNavAltMarkup">';
echo '<div class="navbar-nav">';
echo '<a class="nav-item nav-link active" href="http://localhost:8000/glowna.php">Księgarnia <span class="sr-only">(current)</span></a>';
if(isset($_SESSION['uname'])) {
    echo '<a class="nav-item nav-link" href="http://localhost:8000/zarzadzanieBiblioteka/glownaStrona.php">Wyświetlanie tabel</a>';
    //echo '<a class="nav-item nav-link" href="http://localhost:8000/strony/dodawanie.php">Dodawanie ksiażki</a>';
    echo '<a class="nav-item nav-link" href="/baza/logout.php">Wyloguj</a>';
    echo '<a class="navbar-text text-right justify-content-right">'."Witaj ".$_SESSION['uname'].'</a>';
    //echo '<a class="nav-item nav-link" >'.$_SESSION['uname'].'</a>';
}
else{
    echo '<a class="nav-item nav-link" href="http://localhost:8000/zarzadzanieBibioteka/logowanie.php">Logowanie</a>';
}

echo '</div>';
echo '</div>';
echo '</nav>';
?>