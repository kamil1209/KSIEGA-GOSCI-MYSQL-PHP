<?php
/*Marcin Maj
*2017
*WSB DG*/

require 'header.php';

/*Sprawdzenie czy użytkownik jest zalogowany*/
if (!isset($_SESSION['login'])) {
  echo 'Aby przeglądać stronę należy zalogować się <a href="login.php">tutaj</a> lub utworzyć nowe konto <a href="register.php">tutaj</a>.';
}

else{
  include 'cfg.php';

  /*Jeżeli wciśnięto guzik wyślij*/
  if($_POST['send'] == 1){

    /*Sprawdzenie czy wpisano treść wpisu*/
    if($_POST['wpis'] == ''){
      echo '<center><b>Nie wpisano treści wpisu!</b></center><br><br>';
    }

    else{
      $wpis = mysql_real_escape_string(htmlspecialchars($_POST['wpis']));

      /*Pobranie aktualnej daty i godziny*/
      $data = date("Y-m-d H:i:s");

      /*Wysłanie do bazy danych*/
      mysql_query("INSERT INTO wpisy (datagodzina, wpis) VALUES('$data', '$wpis')") or die("Błąd bazy danych11");

      /*Przekierowanie do strony głównej*/
      header("Location: index.php");
    }
  }

  else{
    /*Pobranie wpisów z bazy danych*/
    $wynik = mysql_query("SELECT datagodzina, wpis FROM wpisy ORDER BY datagodzina DESC") or die("Błąd bazy danych");

    echo '<center><a href="logout.php">Wyloguj</a><br><br>';

    /*Formularz dodawania wpisu*/
    echo 'Dodaj wpis:
    <br>
    <br>';
    echo '<form method="post" action="">';
    echo '<textarea name="wpis" id="wpis" cols="100" rows="10" maxlength="1000">Treść wpisu (max 1000 znaków)</textarea>';
    echo '<input type="hidden" name="send" value="1" />';
    echo '<br>';
    echo '<input type="submit" value="Wyślij" />';
    echo '</form>';
    echo '<br>
    <br>
    <br>';


    /*Tabela z wpisami*/
    echo '<table width="600px">
    <tr>
    <td width="150px"><b>Data i godzina wpisu</b></td>
    <td><b>Treść wpisu</b></td>
    </tr>';

    /*pętla odpowiedzialna za czytanie bazy danych "po jednej linijce" */
    while($r = mysql_fetch_assoc($wynik)){
      echo '<tr>
      <td>'.$r['datagodzina'].'</td>
      <td>'.$r['wpis'].'</td>
      </tr>';
    }
    echo '</table>';
    echo '</center>';
  }

}

require 'footer.php';

 ?>
