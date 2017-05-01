<?php

/*Marcin Maj
*2017
*WSB DG*/

$config['db_server'] = 'localhost'; //adres bazy danych
$config['db_user'] = 'USER'; //użytkownik bazy, domyślnie root
$config['db_pass'] = 'PASSWORD'; //hasło bazy, domyślnie ustalane podczas instalacji
$config['db_name'] = 'TABELA';//nazwa stworzonej tabeli, przykładowo ksiegagosci

$connect = @mysql_connect ($config['db_server'], $config['db_user'], $config['db_pass']);
$sel = @mysql_select_db ($config['db_name']);
mysql_query("SET NAMES 'utf8'");
mysql_query("SET collation_connection = utf8_polish_ci");

if (!$connect) {
  die ('<div class="error">Błąd połaczenia z bazą danych.</div>');
}

 ?>
