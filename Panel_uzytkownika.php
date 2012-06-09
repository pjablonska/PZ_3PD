<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Panel użytkownika</title>
<body bgcolor="teal" text="white">
<center><h2>Panel Użytkownika</h2>
<form method='POST' action='login.php'>
<button type='submit' value='Wyloguj' name='wyloguj'><b>Wyloguj</b></button>
</form>
<form method='POST' action='ticket.html'>
<button type='submit' value='Zgłoś' name='Zgłoś'><b>Zgłoś problem</b></button>



</form>
<br>
<?php
include("config.php");
?>
<?php
session_start();
/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM ticket WHERE Osoba ='".$_SESSION['login']."' ")
or die('Błąd zapytania');
/*
wyświetlamy wyniki, sprawdzamy,
czy zapytanie zwróciło wartość większą od 0
*/
if(mysql_num_rows($wynik) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
   
echo '<table cellpadding=\"4\" border=3 bgcolor="gray">';
echo '<caption align="center"><b>Twoje tickety</b></caption>';
    while($r = mysql_fetch_assoc($wynik)) {
        echo "<tr>";
		echo '<th>Użytkownik</th><th>Budynek</th><th>Piętro</th><th>Nr sali</th><th>Rodzaj sprzętu</th><th>Opis problemu</th><th>Status</th>';
	echo "</tr>";
	echo "<tr>";
 	echo "<td>".$r['Osoba']."</td>";
	echo "<td>".$r['Budynek']."</td>";
	echo "<td>".$r['Pietro']."</td>";
        echo "<td>".$r['Nr_sali']."</td>";
        echo "<td>".$r['Rodzaj']."</td>";
	echo "<td>".$r['Opis']."</td>";
	echo "<td>".$r['Status']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>
</body>
</head>
</html>
