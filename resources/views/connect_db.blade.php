<?php
$hostsql="202.29.39.164";
  $usersql="entvru";
 $passsql = "entvru@VRU2025"; //password phpmyadmin
 private $dbsql = "ENT2020"; //ชื่อฐานข้อมูล


	$connectionInfo = array("Database" => $this->dbsql, "UID" => $this->usersql, "PWD" => $this->passsql,
    "MultipleActiveResultSets" => true, "CharacterSet"  => 'UTF-8', "ReturnDatesAsStrings" => true
);
		$con_Register = sqlsrv_connect($this->hostsql, $connectionInfo);
		if (!$con_Register) {die(print_r(sqlsrv_errors(), true));
			} else {echo "xxxxx";}
?>
      
