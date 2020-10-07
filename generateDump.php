<?php
require_once "credentials.php";

//-----------
// For Linux:
//-----------
// exec("mysqldump --user={".USERNAME."} --password={".PASSWORD."} --host={".HOST."} {".DBNAME."} --result-file={$path} 2>&1", $output);

//-------------
// For Windows:
//-------------
$mysqldump = 'C:\xampp\mysql\bin\mysqldump';
$now = new DateTime();
exec("mkdir backup");
exec("{$mysqldump} --user=".USERNAME." --password=".PASSWORD." ".DBNAME." > ./backup/laptime-".$now->getTimestamp().".sql");

var_dump($output);