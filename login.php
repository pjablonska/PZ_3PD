<?php

session_start();

if (isset($_POST['konto']) and isset($_POST['haslo']) )

{

require('conn.php');

$konto=mysql_real_escape_string(trim($_POST['konto']));

$password=mysql_real_escape_string(trim($_POST['haslo']));

if ($konto!="" and $password!="")

{

   $password = sha1($password);

   $zapytanie="SELECT id FROM uzytkownik WHERE login='$konto' and haslo ='$password'";

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

<body>

<form  action="login.php" method="post">

<strong>Login:</strong><input name="login" type="text" value="" /><br>

<strong>Haslo:</strong><input name="haslo" type="password" value="" /><br>

<input type="submit" value="Zaloguj" />

</form>

</body>

</html>

<?php

}?>

