<meta http-equiv="content-type" content="text/html; charset=utf-8">
<body bgcolor="teal" text="white">
<?php
include("config.php");
?>
<?php

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM ticket")
or die('Błąd zapytania');

if(mysql_num_rows($wynik) > 0) {

$a = trim($_GET['a']);
$ID_ticketu = trim($_GET['ID_ticketu']);

if($a == 'del' and !empty($ID_ticketu)) {
    
    /* usuwamy rekord */
    mysql_query("DELETE FROM ticket WHERE ID_ticketu='$ID_ticketu'")
    or die('Błąd zapytania: '.mysql_error());
    
    echo 'Rekord został usunięty z bazy';
echo'<meta http-equiv="Refresh" content="1; url=Edycja_ticket.php" />';
}
}
?> 
