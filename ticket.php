<?php
include("config.php");
?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<body bgcolor="teal" text="white">
</head>  
<?php

if(isset($_POST['submit']))//sprawdzamy, czy wszystkie pola wypełnione
{
	if(empty($_POST['Budynek']) || empty($_POST['Pietro']) || empty($_POST['Nr_sali']) || empty($_POST['Rodzaj']) || empty($_POST['Opis']))


	{
	echo "Wypełnij wszystkie pola !";
		echo "<p><a href=\"ticket.html\">Powrót do formularza zgłoszenia problemu</a></p>";	
	} else {
		zapiszDane();
		
	}
}


function zapiszDane()
{
session_start();
        $Osoba = $_SESSION['login'];
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
echo '<meta http-equiv="Refresh" content="1; url=Panel_uzytkownika.php" />';
	}

}


?>

