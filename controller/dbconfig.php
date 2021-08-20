<?php

include('../admin/config.php');

try
{
 $DB_con = new PDO('mysql:host='. $database['host'] .';dbname='. $database['db'], $database['user'], $database['pass']);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 $e->getMessage();
}
