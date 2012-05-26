
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<body bgcolor="teal" text="white">
<?php
session_start();
mysql_connect('localhost','root','root');
mysql_select_db('system_ticket');

if(isset($_SESSION['zalogowany'])) {

}else{

if(isset($_POST['wyslij'])) {


   if(mysql_num_rows(mysql_query("SELECT login, haslo
   FROM uzytkownik WHERE login = '".$_POST['login']."' 
   && haslo = '".$_POST['haslo']."' ")) > 0) {


      


           $_SESSION['zalogowany'] = true;
           $_SESSION['login'] = $_POST['login'];
           $_SESSION['haslo'] = $_POST['haslo'];
           echo "Jesteś zalogowany " .$_SESSION['login'];


       } else { 

   echo "Złe hasło, lub login proszę spróbować ponownie";
}
} else { 
   echo "Nie ma takiego użytkownika";
}
} 

if(isset($_POST['wyloguj'])) {
session_destroy();
echo "Zostałeś wylogowany " .$_SESSION['login'];
}
?>
   


