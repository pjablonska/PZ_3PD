<?php

require('conn.php');

if (isset($_POST['konto']) and isset($_POST['password']) and isset($_POST['password2']))

{

if ($_POST['haslo']==$_POST['haslo2'])

  {

   $konto =  mysql_real_escape_string (trim($_POST['konto']));      

   $password = sha1(mysql_real_escape_string (trim($_POST['haslo']))); 

   $ile =mysql_query("SELECT * FROM `uzytkowanik` WHERE login = '$konto'");

   $ile = mysql_num_rows($ile);

   if ($ile==0)   {

   $zapytanie="INSERT INTO uzytkownik (login,haslo) VALUES('$konto','$password')";

   mysql_query($zapytanie) or die("Wystąpił błąd" );

      echo('Konto '.$konto.' zostalo utworzone');

        }

   else

   {

   echo("Taki uzytkownik juz istnieje. Kliknij wstecz aby zarejestrowac sie ponownie");

   }

  }

  else echo ("Podane hasla nie zgadzaja sie");

}

else{

?>

<html>

<body>

<h1>Dodaj nowego uzytkownika</h1>

<form action="register.php" method="post">
<strong>Imie:</strong><input name="imie" type="text" value="" /><br>

<strong>Nazwisko:</strong><input name="nazwisko" type="text" value="" /><br>

<strong>Login:</strong><input name="login" type="text" value="" /><br>

<strong>Haslo:</strong><input name="haslo" type="password" value="" /><br>

<strong>Powtorz haslo:</strong><input name="haslo2" type="password" value="" /><br>

<input type="submit" value="Zarejestruj" />

</form>

</body>

</html>

<?php

}

 

?>


