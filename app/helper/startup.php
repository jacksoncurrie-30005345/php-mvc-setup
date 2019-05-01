<?php

  require_once(dirname(dirname(__DIR__)).'/vendor/autoload.php');
  $dotenv = new Dotenv\Dotenv(dirname(dirname(__DIR__)),'/.env');
  $dotenv->load();

  define ('APPROOT', dirname(dirname(__FILE__)));
  define ('URLROOT', $_ENV['URLROOT']);
  define ('SITENAME', $_ENV['SITENAME']);

  define ("DBHOST", $_ENV['DBHOST']);
  define ("DBUSER", $_ENV['DBUSER']);
  define ("DBPASS", $_ENV['DBPASS']);
  define ("DBNAME", $_ENV['DBNAME']);

?>
