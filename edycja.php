<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Edycja Użytkowników</title>
<body bgcolor="teal" text="white">
<center><h2>Edycja Użytkowników</h2>
<?php
include("config.php");
?>
<?php

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM uzytkownik")
or die('Błąd zapytania');

/*
wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/
if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    echo '<table cellpadding=\"4\" border=3 bgcolor="gray">';
    while($r = mysql_fetch_assoc($wynik)) {
        echo "<tr>";
 	echo "<td>".$r['ID']."</td>";
	echo "<td>".$r['imie']."</td>";
	echo "<td>".$r['nazwisko']."</td>";
        echo "<td>".$r['login']."</td>";
        echo "<td>".$r['mail']."</td>";
        echo "<td>
	<a href=\"usuwanie_uzyt.php?a=del&amp;ID={$r['ID']}\">DEL</a>
	<a href=\"edycja_uzyt.php?a=edit&amp;ID={$r['ID']}\">EDIT</a> 

</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>
<br>
<form method='POST' action='login.php'>
<button type='submit' value='Wyloguj' name='wyloguj'><b>Wyloguj</b></button>
</form>
<form method='POST' action='Panel_admina.php'>
<button type='submit' value='powrot' name='powrot'><b>Powrót do Panelu</b></button>
</form>
</body>
</head>
</html>
