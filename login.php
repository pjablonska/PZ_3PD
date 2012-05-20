<?php

session_start();

if (isset($_POST['login']) and isset($_POST['haslo']) )

{

require('config.php');

$login=mysql_real_escape_string(trim($_POST['login']));

$haslo=mysql_real_escape_string(trim($_POST['haslo']));

if ($login!="" and $haslo!="")

{

   $haslo = sha1($haslo);

   $zapytanie="SELECT id FROM uzytkownik WHERE login='$login' and haslo ='$haslo'";

   $temp=mysql_query($zapytanie) or die("Wystąpił błąd");

    $ile=mysql_num_rows($temp);

   $temp=mysql_fetch_array($temp);

   $id=$temp['id'];

 

   if ($ile==1)

   {

     $_SESSION['user_id']=$id;

     $_SESSION['login']=$konto;

     echo('Zostales zalogowany. ');

   }

   else echo ('Podales zle dane. Kliknij wstecz aby sprobowac ponownie.');

}

}

else{

?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<form  action="ticket.html" method="post">
<title>Logowanie</title>
<body bgcolor="teal" text="white">
<h1>Logowanie</h1><br><br>

<table cellpadding="0" cellspacing="0" border="0">
<tr><td>Login</td><td><input type="text" name="Login" value="" /></td></tr>
<tr><td>Hasło</td><td><input type="password" name="haslo" value="" /></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Zaloguj" /></td></tr>

</form>

</body>
</head>
</html>

<?php

}?>

