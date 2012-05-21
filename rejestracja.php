<?
ob_start();
session_start();
define('DB_HOST','localhost');
define('DB_USER','root'); //wpisz nazwęużytkownika bazy danych
define('DB_PASS','root'); //wpisz hasło dla tego użytkownika
define('DB_DB','system_ticket');






//inkludujemy plik z hasłami

//include("conf.php");

//Laczenie z baza
//mysql_connect ($DB_HOST, $DB_USER $DB_PASS)or die("Nie można się połączyć z bazą: //".mysql_error());
//mysql_select_db($DB_HOST) or die(mysql_error());

?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
  <title>Rejestracja</title>
<form method="post" action="<? echo $PHP_SELF;?>" METHOD=POST enctype="multipart/form-data">
<center>
<center><b>Imię:<b><br />
    <input type="text" name="imie" style="font-size: 10pt; font-family: Tahoma; font-weight: bold" /><br />
<center><b>Nazwisko:<b><br />
    <input type="text" name="nazwisko" style="font-size: 10pt; font-family: Tahoma; font-weight: bold" /><br />
    <center><b>Login:<b><br />
    <input type="text" name="login" style="font-size: 10pt; font-family: Tahoma; font-weight: bold" /><br />
        <b>E-mail:<b><br />
    <input type="text" name="email" style="font-size: 10pt; font-family: Tahoma; font-weight: bold" /><br />
        <b>Hasło:</b><br />
    <input type="password" name="haslo" style="font-size: 10pt; font-family: Tahoma; font-weight: bold" /><br /><br>
    
        <input type="submit" name="submit" value="Rejestracja" id="dalej" style="font-size: 10pt; font-family: Tahoma; font-weight: bold" /></center>

</form>
<?
//Jak wiadomo dobrze użyć funkcji trim aby usunąć zbędne znaki
$login = trim($_POST['login']);
$email = trim($_POST['email']);    
$pass_md5 = md5($_POST['haslo']);
$pass = $_POST['haslo'];
if($_POST['submit']) {
$checkuser = mysql_query("SELECT login FROM users WHERE login='$login'");
$username_exist = mysql_num_rows($checkuser);

//Jezeli zarejestrowanych takich nazw jest wiecej niz 0
if($username_exist > 0){
    echo '
      <h2><center><b>Ta nazwa jest już zajęta wybierz inną</b></center></h2>
';
    unset($login);
    exit();
}

//Wysylamy zapytanie z logowaniem
$zapytanie = "INSERT INTO `users` (`id`, `login`, `email`, `haslo`) VALUES (NULL, '$login', '$email', '$pass_md5')";
$idzapytania = mysql_query($zapytanie);

if(!$idzapytania)
{
    echo 'blad!' .  mysql_error();
}
else
{
    echo '
      <h2><center><b>Poprawnie się zarejestrowałe¶, <a href="logowanie.php">możesz się zalogować</a></b></center></h2>
';
}}
?>

