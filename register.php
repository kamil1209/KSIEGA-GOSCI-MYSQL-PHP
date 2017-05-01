<?php
/*Marcin Maj
*2017
*WSB DG*/
 ?>

<?php

require 'cfg.php';

/*Jeżeli naciśnięto guzik zarejestruj*/
if($_POST['send'] == 1){

  /*Sprawdzenie czy uzupełniono login/hasło*/
  if($_POST['login'] == '' | $_POST['pass'] == ''){
    echo '<center><b>Nie podano loginu lub hasła!</b></center><br><br>';
  }
  else{
    $login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
    $pass = mysql_real_escape_string(htmlspecialchars($_POST['pass']));

    /*Posolenie i zaszyfrowanie hasła MD5*/
    $pass = md5('12341234'.$pass.'12341234');

    /*Sprawdzenie czy podany użytkownik już nie istnieje*/
    $check = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE login='$login' LIMIT 1"));

    if($check[0] >= 1){
      echo 'Podany użytkownik już istnieje!';
      include 'footer.php';
      exit();
    }

    else{
      /*Wysłanie danych użytkownika do bazy danych*/
      mysql_query("INSERT INTO users (login, pass) VALUES('$login', '$pass');") or die("Błąd bazy danych");

      /*Komunikat z przekierowaniem do strony głównej*/
      echo 'Rejestracja powiodła się, <a href="index.php">wróć do strony głównej</a>';
      include 'footer.php';
      exit();
    }
  }
}

 ?>


<!-- Formularz z rejestracją użytkownika -->
<form method="post" action="">
<table width="355" cellspacing="0" cellpadding="10">
<tr>
<td width="100" valign="top"><label for="login">Login:</label></td>
<td><input maxlength="32" type="text" name="login" id="login" /></td>
</tr>
<tr>
<td width="100" valign="top"><label for="pass">Hasło:</label></td>
<td><input maxlength="32" type="password" name="pass" id="pass" /></td>
</tr>
<input type="hidden" name="send" value="1" />
<tr>
<td width="100" valign="top"></td>
<td><input type="submit" value="Zarejestruj" /></td>
</tr>
</table>
</form>

<?php
require 'footer.php';
 ?>
