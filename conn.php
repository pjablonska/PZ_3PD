<?
define('DB_HOST','localhost');
define('DB_USER','root'); //wpisz nazwęużytkownika bazy danych
define('DB_PASS','root'); //wpisz hasło dla tego użytkownika
define('DB_DB','system_ticket');

$connect = mysql_connect(DB_HOST, DB_USER, DB_PASS)
or die('Nie udało połączyc się z bazą danych. '.mysql_error());

mysql_select_db(DB_DB,$connect)
?>

