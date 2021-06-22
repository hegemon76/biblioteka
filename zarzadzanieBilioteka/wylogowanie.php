<?php
session_start();
 
//rozpoczecie sesji
$_SESSION = array();
 
// Zakonczenie sesji
session_destroy();
 
// Przekierowanie do logowania
header("Location: http://localhost:8000/php/logowanie.php");
exit;