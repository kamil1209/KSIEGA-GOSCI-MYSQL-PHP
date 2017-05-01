<?php
/*Marcin Maj
*2017
*WSB DG*/

require 'header.php';

/*Sprawdzenie czy użytkownik jest zalogowany*/
if (!isset($_SESSION['login'])) {

  /*Jeżeli guzik wyślij został naciśnięty*/
  if ($_POST['send'] == 1) {

    require 'cfg.php';

    /*zmiana niedozwolonych znaków oraz zmiana loginu na małe litery*/
    $login = htmlspecialchars(mysql_real_escape_string(strtolower($_POST['login'])));
    $pass = htmlspecialchars(mysql_real_escape_string($_POST['pass']));

      /*sprawdzenie czy login i hasło zostały uzupełnione*/
      if (!$login or empty($login)) {
          die ('Podaj login!');
      }

      if (!$pass or empty($pass)) {
          die ('Podaj hasło!');
      }

      /*Posolenie i zaszyfrowanie hasła*/
      $pass = md5('12341234'.$pass.'12341234');

      /*Sprawdzenie czy użytkownik istnieje*/
      $userExists = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE login= '$login' AND pass= '$pass'"));

      /*Jeżeli użytkownik nie został znaleziony*/
      if ($userExists[0] == 0) {
          echo '<div class="error">Login lub hasło nieprawidłowe!</div>';
      }

      /*Użytkownik został znaleziony, przekazanie do zmiennej sesyjnej loginu, hasła oraz id*/
      else {

          $_SESSION['login'] = $login;
          $_SESSION['pass'] = $pass;
  	      $_SESSION['id'] = $user['id'];

          /*przekierowanie do strony głównej*/
          header("Location: index.php");
      }
  }


  /*Formularz login, hasło -> zaloguj*/
  else {

  ?>

  <!-- Formularz z logowaniem użytkownika -->
   <form method="post" action="">
    <label class="label" for="label">Login:</label>
    <input class="login" type="text" name="login" maxlength="32" id="login" required="" />
    <label class="label" for="label">Hasło:</label>
    <input class="password" type="password" name="pass" maxlength="32" id="pass" required="" /><br />
    <input type="hidden" name="send" value="1" />
    <input type="submit" value="Zaloguj" />
   </form>

  <?php
  }
}

/*Jeżeli użytkownik jest już zalogowany*/
else{
  echo '<div class="error">Jesteś już zalogowany/a</div>';
}

require 'footer.php';

 ?>
