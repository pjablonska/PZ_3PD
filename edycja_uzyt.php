<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Edycja użytkowników</title>
<body bgcolor="teal" text="white">
<center><h2>Edycja Użytkowników</h2>
<?php

mysql_connect ("localhost", "root", "root") or die ("nie mozna polaczyc sie z mysql");

mysql_select_db ("system_ticket") or die ("nie mozna polaczyc sie z mysql");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM uzytkownik")
or die('Błąd zapytania');

if(mysql_num_rows($wynik) > 0) {

$a = trim($_REQUEST['a']);
$ID = trim($_REQUEST['ID']);

if($a == 'edit' and !empty($ID)) {
    /* zapytanie do tabeli */
    $wynik = mysql_query("SELECT * FROM uzytkownik WHERE
    ID='$ID'")
    or die('Błąd zapytania');
    /* 
     wyświetlamy wyniki, sprawdzamy,
     czy zapytanie zwróciło wartość większą od 0
     */
    if(mysql_num_rows($wynik) > 0) {
         /* odczytujemy zawartość wiersza z tabeli */
        $r = mysql_fetch_assoc($wynik);
        /* wczytujemy dane do formularza */
        /* 
        w formularz znajdują się ukryte pola "a"
        z wartością "save" i pole "id" z wartością
        zmiennej id
        */
        echo '<form action="edycja_uzyt.php" method="post">
        <input type="hidden" name="a" value="save" />
        <input type="hidden" name="ID" value="'.$ID.'" />
        Imię:<br />
        <input type="text" name="imie"
        value="'.$r['imie'].'" /><br />
	Nazwisko:<br />
        <input type="text" name="nazwisko"
        value="'.$r['nazwisko'].'" /><br />
	Login:<br />
        <input type="text" name="login"
        value="'.$r['login'].'" /><br />
        E-mail:<br />
        <input type="text" name="mail"
        value="'.$r['mail'].'" /><br><br>
        <button type="submit" value="zapisz" name="zapisz"><b>Zapisz zmiany</b></button>
        </form>';
    }
}
elseif($a == 'save') {
    /* odbieramy zmienne z formularza */
    $ID = $_POST['ID'];
    $imie = trim($_POST['imie']);
    $nazwisko = trim($_POST['nazwisko']);
    $login = trim($_POST['login']);
    $mail = trim($_POST['mail']);
    /* uaktualniamy tabelę test */
    mysql_query("UPDATE uzytkownik SET imie='$imie',nazwisko='$nazwisko',login='$login',
    mail='$mail' WHERE ID='$ID'")
    or die('Błąd zapytania');
    echo 'Dane zostały zaktualizowane';
echo'<meta http-equiv="Refresh" content="1; url=edycja.php" />';
}
}
?> 
