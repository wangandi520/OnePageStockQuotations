<?php
if ($_SERVER['HTTP_REFERER']){
//$_SERVER['HTTP_REFERER']
//($_SERVER['SERVER_NAME'] == 'fstock.sinaapp.com')
$data = $_POST['data'];
$type = $_POST['type'];
$host = 'localhost';
$port = '3306';
$user = 'root';
$password = 'password';
$database = 'db';
$con = mysql_connect($host.':'.$port,$user,$password);
mysql_select_db($database,$con);
if ($type == 1){
$query = "select * from data where id = ".$data;
$result = mysql_query($query,$con);
$line = mysql_fetch_array($result);
$data = $line['data'];
$list=array("data"=>$data);
echo json_encode($list);
}
else if ($type == 2){
if (!($data == '')){
$query = 'insert into data values(NULL,"'.$data.'")';
$result = mysql_query($query,$con);
$list=array("data"=>mysql_insert_id());
echo json_encode($list);
}
else{
$list=array("data"=>0);
echo json_encode($list);
}
}
else if ($type == 3){
$query = 'delete from data where id = '.$data;
$result = mysql_query($query,$con);
$list=array("data"=>-1);
echo json_encode($list);
}
else if ($type == 4){
$query = 'delete from data';
$result = mysql_query($query,$con);
$query = 'alter table data auto_increment = 1';
$result = mysql_query($query,$con);
$list=array("data"=>0);
echo json_encode($list);
}
mysql_close($con);
}
else
echo 'Error';

/*
CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
*/
?>
