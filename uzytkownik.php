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
	if(empty($_POST['imie'])||empty($_POST['nazwisko'])||empty($_POST['login'])||empty($_POST['haslo'])||empty($_POST['mail']))
	{
		echo "Wypełnij wszystkie pola !";
		echo "<p><a href=\"rejestracja.html\">Powrót do formularza rejestracji</a></p>";
	} else {
		zapiszDane();
	}
}


function zapiszDane()
{
        $imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	$mail = $_POST['mail'];

$zapisz = mysql_query("INSERT INTO uzytkownik SET imie='".$imie."', nazwisko='".$nazwisko."', login='".$login."', haslo='".$haslo."', mail='".$mail."'");

if(!$zapisz)
	{
		echo "Dane nie zostały zapisane.";

	} else {
		echo "Dane zostały zapisane!";
echo'<meta http-equiv="Refresh" content="1; url=tytulowa.html" />';	
	}

}

?>

