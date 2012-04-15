<?php

session_start();

if (isset($_SESSION['user_id']) and isset($_SESSION['login']))

{

echo "Jestes zalogowany. ";

echo "Twój login to: ";

echo $_SESSION['login'];

}

else

{

echo "Nie jestes zalogowany";

 

}

?>
