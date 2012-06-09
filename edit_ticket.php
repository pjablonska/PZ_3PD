<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Edycja Ticketów</title>
<body bgcolor="teal" text="white">
<center><h2>Edycja ticketów</h2>

<?php

mysql_connect ("localhost", "root", "root") or die ("nie mozna polaczyc sie z mysql");

mysql_select_db ("system_ticket") or die ("nie mozna polaczyc sie z mysql");

/* zapytanie do konkretnej tabeli */
$wynik = mysql_query("SELECT * FROM uzytkownik")
or die('Błąd zapytania');

if(mysql_num_rows($wynik) > 0) {

$a = trim($_REQUEST['a']);
$ID_ticketu = trim($_REQUEST['ID_ticketu']);

if($a == 'edit' and !empty($ID_ticketu)) {
    /* zapytanie do tabeli */
    $wynik = mysql_query("SELECT * FROM ticket WHERE
    ID_ticketu='$ID_ticketu'")
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
        z wartością "save" i pole "id_ticketu" z wartością
        zmiennej id
        */
        echo '<form action="edit_ticket.php" method="post">
        <input type="hidden" name="a" value="save" />
        <input type="hidden" name="ID_ticketu" value="'.$ID_ticketu.'" />
        Użytkownik:<br />
        <input type="text" name="Osoba"
        value="'.$r['Osoba'].'" /><br>
<br>Budynek:<br>
<select name="Budynek" value="'.$r['Budynek'].'">
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>E</option>
</select><br>

<br>Piętro:<br>
<select name="Pietro" value="'.$r['Pietro'].'">
<option>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
</select><br>
       <br> Nr_sali:<br />
        <input type="text" name="Nr_sali"
        value="'.$r['Nr_sali'].'" /><br />
Rodzaj awarii:<br><select name="Rodzaj">
<option>Komputer w sali</option>
<option>Awaria komputera pracownika</option>
<option>Awaria sieci</option>
<option>Inne</option>
</select><br>
	Opis problemu:<br />
        <input type="text" name="Opis"
        value="'.$r['Opis'].'" /><br />
<br>Status:<br>
<select name="Status" value="'.$r['Status'].'">
<option>Przyjęto zgłoszenie</option>
<option>Oczekujący</option>
<option>W trakcie realizacji</option>
<option>Wysłany do serwisu</option>
<option>Zakończony</option>
<option>Anulowny</option>


</select><br        
<input type="text" name="Status"
        value="'.$r['Status'].'" /><br>
        <button type="submit" value="zapisz" name="zapisz"><b>Zapisz zmiany</b></button>
        </form>';
    }
}
elseif($a == 'save') {
    /* odbieramy zmienne z formularza */
    $ID_ticketu = $_POST['ID_ticketu'];
    $Osoba = trim($_POST['Osoba']);
    $Budynek = trim($_POST['Budynek']);
    $Pietro = trim($_POST['Pietro']);
    $Nr_sali = trim($_POST['Nr_sali']);
	 $Rodzaj = trim($_POST['Rodzaj']);
 $Opis = trim($_POST['Opis']);
 $Status = trim($_POST['Status']);
    /* uaktualniamy tabelę test */
    mysql_query("UPDATE ticket SET Osoba='$Osoba',Budynek='$Budynek',Pietro='$Pietro',
    Nr_sali='$Nr_sali', Rodzaj='$Rodzaj', Opis='$Opis', Status='$Status' WHERE ID_ticketu='$ID_ticketu'")
    or die('Błąd zapytania');
    echo 'Dane zostały zaktualizowane';
echo'<meta http-equiv="Refresh" content="2; url=Panel_admina.php" />';
}
}
?> 
