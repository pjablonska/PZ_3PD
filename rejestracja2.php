<form action="rejestracja2.php" method="post">
imie:<br />
<input type="text" name="imie" /><br />
nazwisko:<br />
<input type="text" name="nazwisko" /><br />
e-mail:
<input type="text" name="email" /><br />
login:
<input type="text" name="login" /><br />
haslo:
<input type="password" name="haslo" /><br />
<input type="submit" value="dodaj" />
</form>

<?php
// odbieramy dane z formularza
$ID = $_POST[NULL];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$email = $_POST['mail'];

if($imie and $nazwisko and $mail and $login and $haslo) {
    
    // łączymy się z bazą danych
    $connection = @mysql_connect('localhost', 'root', 'root')
    or die('Brak połączenia z serwerem MySQL');
    $db = @mysql_select_db('system_ticket', $conn)
    or die('Nie mogę połączyć się z bazą danych');
    
    // dodajemy rekord do bazy
    $ins = @mysql_query("INSERT INTO test SET ID = NULL, imie='$imie', nazwisko = '$nazwisko', login='$login', haslo='$haslo', mail='$mail'");
    
    if($ins) echo "Rekord został dodany poprawnie";
    else echo "Błąd nie udało się dodać nowego rekordu";
    
    mysql_close($conn);
}

?> 
