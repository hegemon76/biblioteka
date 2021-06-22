<?php

include('polaczenie.php');

//wyswietalanie polecenie sql
$sql = "SELECT * FROM ksiazki";
$result = mysqli_query($connect, $sql);
$rowCount = mysqli_num_rows($result); //liczba wierszy

//jezeli wybrano wiersze z bazy
if ($rowCount > 0) {
    echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Imie Autora</th>';
        echo '<th scope="col">Nazwisko autora</th>';
        echo '<th scope="col">Tytul</th>';
        echo '<th scope="col">Cena</th>';
        echo "</tr>";
        echo '</thead>';
    //dopoki do zmiennej $row wprowadzane są dane jako wyniki
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tbody>';
        echo '<tr>';
        echo '<th scope="row">' . $row['idksiazki'] . '</th>';
        echo '<td>'. $row['imieautora'] .'</td>';
        echo '<td>' . $row['nazwiskoautora'] . '</td>';
        echo '<td>' . $row['tytul'] . '</td>';
        echo '<td>' . $row['cena'] . '</td>';
        echo '</tr>';
        echo '</tbody>';
    }
} else echo "no results found";
