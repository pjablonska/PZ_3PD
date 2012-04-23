<?php
$connect = mysql_connect('localhost', 'root', 'root');
$wybierzBaze = mysql_select_db('system_ticket');

if(!$connect)
{
	echo "Błąd podczas połączenia z bazą. Sprawdź parametry połączenia.";
}

if(isset($_POST['submit']))
{
	if($_POST['imie'] == '' && $_POST['nazwisko'] == '' && $_POST['login'] == '' && $_POST['haslo'] == '' && $_POST['mail'] == '')
	{
		echo "Wypełnij wszystkie pola !";
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
	}
}
?>

