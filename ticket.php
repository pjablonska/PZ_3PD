<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head> 
<?php

$connect = mysql_connect('localhost', 'root', 'root');
$wybierzBaze = mysql_select_db('system_ticket');

if(!$connect)
{
	echo "Błąd podczas połączenia z bazą. Sprawdź parametry połączenia.";
}

	if(mysql_num_rows(mysql_query("SELECT concat ('imie','nazwisko') as 'Osoba', haslo FROM uzytkownik WHERE imie = '".$_POST['imie']."' && nazwisko='".$_POST['nazwisko']."' && haslo = '".$_POST['haslo']."' ")) > 0)

if(isset($_POST['submit']))//sprawdzamy, czy wszystkie pola wypełnione
{
	if(empty($_POST['Osoba'])||empty($_POST['Budynek'])||empty($_POST['Pietro'])||empty($_POST['Nr_sali'])||empty($_POST['Rodzaj'])||empty($_POST['Opis']))


	{
		echo "Wypełnij wszystkie pola !";
		echo "<p><a href=\"ticket.html\">Powrót do formularza zgłoszenia problemu</a></p>";
	} else {
		zapiszDane();
	}
}


function zapiszDane()
{
        $Osoba = $_POST['Osoba'];
	$Budynek = $_POST['Budynek'];
	$Pietro = $_POST['Pietro'];
	$Nr_sali = $_POST['Nr_sali'];
	$Rodzaj = $_POST['Rodzaj'];
	$Opis = $_POST['Opis'];

$zapisz = mysql_query("INSERT INTO ticket SET Osoba='".$Osoba."', Budynek='".$Budynek."', Pietro='".$Pietro."', Nr_sali='".$Nr_sali."', Rodzaj='".$Rodzaj."', Opis='".$Opis."'");

if(!$zapisz)
	{
		echo "Dane nie zostały zapisane.";

	} else {
		echo "Dane zostały zapisane!";
	}
}

?>

