<?php
include ("dbinfo.inc.php");



mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query="CREATE TABLE $table (id int(6) NOT NULL auto_increment,title varchar(40) NOT NULL,artist_first varchar(20) NOT NULL,artist_last varchar(20) NOT NULL,show_title varchar(40) NOT NULL,year INT(4) NOT NULL,artwork_height int(4) NOT NULL,artwork_width int(4) NOT NULL,artwork_depth int(4) NOT NULL,image_width int(4) NOT NULL,image_height int(4) NOT NULL,filename varchar(50) NOT NULL,PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";

mysql_query($query);
mysql_close();
?>
DB created.
