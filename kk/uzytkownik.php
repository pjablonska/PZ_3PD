<?php include ("config.php");

if(isset($_POST['submit']))
{
	if($_POST['imie'] == '' && $_POST['nazwisko'] == '' && $_POST['login'] == '' && $_POST['haslo'] == '' && $_POST['mail'] == '')
	{
		echo "Wypełnij wszystkie pola !";
	} 
else{
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

$spr1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uzytkownik WHERE login='$login' LIMIT 1"));
$spr2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uzytkownik WHERE mail='$mail' LIMIT 1")); 
$komunikaty = '';
if ($spr1[0] >= 1) {
$komunikaty .= "Ten login jest zajety!<br>"; }
if ($spr2[0] >= 1) {
$komunikaty .= "Ten e-mail jest już uzywany!<br>"; }
if ($komunikaty) {
echo '
<b>Rejestracja nie powiodla się, popraw nastepujace bledy:</b><br>
'.$komunikaty.'<br>';
}else{

$zapisz = mysql_query("INSERT INTO uzytkownik SET imie='".$imie."', nazwisko='".$nazwisko."', login='".$login."', haslo='".$haslo."', mail='".$mail."'");

if(!$zapisz)
	{
		echo "Dane nie zostaly zapisane.";
	} else {
		echo "Dane zostaly zapisane!";
	}
}
}
?>

