<?php include ("config.php");
?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<?php 
if(isset($_POST['submit']))
{
	if(!empty($_POST['imie'])&& !empty($_POST['nazwisko']) && !empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['powtorz']) && !empty($_POST['mail']))
	{
		zapiszDane();
	
}
else{
		
                     echo "Wypełnij wszystkie pola !";
	echo "<p><a href=\"rejestracja.html\">Powrót do formularza rejestracji</a></p>";

	}
}


function zapiszDane()
{
        $imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	$powtorz = $_POST['powtorz'];
	$mail = $_POST['mail'];
	
$spr1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uzytkownik WHERE login='$login' LIMIT 1"));
$spr2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uzytkownik WHERE mail='$mail' LIMIT 1")); 
$komunikaty = '';
if ($spr1[0] >= 1) {
$komunikaty .= "Ten login jest zajety!<br>"; }
if ($spr2[0] >= 1) {
$komunikaty .= "Ten e-mail jest już uzywany!<br>"; }
if ($powtorz != $haslo){
$komunikaty .= "hasla sie nie zgadzaja<br>";}
if ($komunikaty) {
echo '
<b>Rejestracja nie powiodla się, popraw nastepujace bledy:</b><br>
'.$komunikaty.'<br>';
echo "<p><a href=\"rejestracja.html\">Powrót do formularza rejestracji</a></p>";
}else{

$zapisz = mysql_query("INSERT INTO uzytkownik SET imie='".$imie."', nazwisko='".$nazwisko."', login='".$login."', haslo='".$haslo."', mail='".$mail."'");
echo "Dane zostaly zapisane!";
	
}
}
?>

