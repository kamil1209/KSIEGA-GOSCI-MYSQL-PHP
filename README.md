# KSIEGA-GOSCI-MYSQL-PHP

## 1. Stworzenie bazy danych:
CREATE DATABASE ksiegagosci;
<br />
use ksiegagosci;
<br />
<br />
CREATE TABLE IF NOT EXISTS users (
  <br />
  id int(2) NOT NULL AUTO_INCREMENT,
  <br />
  login varchar(32) NOT NULL,
  <br />
  pass varchar(32) NOT NULL,
  <br />
  PRIMARY KEY (id)
  <br />
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
<br />
<br />
CREATE TABLE IF NOT EXISTS wpisy (
  <br />
  datagodzina datetime NOT NULL,
  <br />
  wpis varchar(1000) NOT NULL
  <br />
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

## 2. Konfiguracja pliku cfg.php
W pliku należy ustawić adres, login oraz hasło do bazy danych.
Na potrzeby zaliczenia można użyć root oraz hasła podanego przy instalacji MySQL ;)

## 3. Skopiowanie plików
Należy skopiować wszystkie pliki do katalogu ze stroną www.

## 4. Poprawki
Myślę, że fajnie by było jakby kilka osób nie oddało żywcem tego kodu także wypada chociaż zmienić wygląd lub nazewnictwo zmiennych :)

## 5. Gotowe
System jest gotowy do użytku. Nie ma żadnego wyglądu bo nie musi. Poniżej kilka zdjęć:
Logowanie:
![alt text](http://i65.tinypic.com/2hfqssn.png)
<br />
<br />
Strona główna po zalogowaniu:
![alt text](http://i65.tinypic.com/6iv5so.png)
