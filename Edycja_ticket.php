
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Edycja Ticketów</title>
<body bgcolor="teal" text="white">
<center><h2>Edycja ticketów</h2>
<?php
include("config.php");
?>
<?php

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM ticket")
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
		echo '<th>Użytkownik';
		echo "</th>";
		echo '<th>Budynek';
		echo "</th>";
		echo '<th>Piętro';
		echo "</th>";
		echo '<th>Nr sali';
		echo "</th>";
		echo '<th>Rodzaj awarii';
		echo "</th>";
		echo '<th>Opis problemu';
		echo "</th>";
		echo '<th>Status';
		echo "</th>";
	echo "</tr>";
	echo "<tr>";
 	echo "<td>".$r['Osoba']."</td>";
	echo "<td>".$r['Budynek']."</td>";
	echo "<td>".$r['Pietro']."</td>";
        echo "<td>".$r['Nr_sali']."</td>";
        echo "<td>".$r['Rodzaj']."</td>";
	echo "<td>".$r['Opis']."</td>";
	echo "<td>".$r['Status']."</td>";
	echo "<td>
	<a href=\"usun_ticket.php?a=del&amp;ID_ticketu={$r['ID_ticketu']}\">DEL</a>
	<a href=\"edit_ticket.php?a=edit&amp;ID_ticketu={$r['ID_ticketu']}\">EDIT</a> 

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
