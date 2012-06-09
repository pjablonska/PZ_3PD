<meta http-equiv="content-type" content="text/html; charset=utf-8">
<body bgcolor="teal" text="white">
<?php
include("config.php");
?>
<?php

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM uzytkownik")
or die('Błąd zapytania');

if(mysql_num_rows($wynik) > 0) {

$a = trim($_GET['a']);
$ID = trim($_GET['ID']);

if($a == 'del' and !empty($ID)) {
    
    /* usuwamy rekord */
    mysql_query("DELETE FROM uzytkownik WHERE ID='$ID'")
    or die('Błąd zapytania: '.mysql_error());
    
    echo 'Rekord został usunięty z bazy';
echo'<meta http-equiv="Refresh" content="1; url=edycja.php" />';
}
}
?> 
