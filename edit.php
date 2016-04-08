<?php

$i=$_GET["id"];

echo "<html><head><title>image viewer</title></head><body>\n";

include ("./dbinfo.inc.php");

$titles = array ("Title","Artist First Name","Artist lase name","Show title","Year","Artwork height","Artwork width","Artwork Depth");
	
$query="SELECT * FROM $table WHERE id='$i'";

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$result=mysql_query($query);
$row=mysql_fetch_row($result);
mysql_close();

echo <<<EOF
<form action="update.php" method="POST">
<input type="hidden" name="id" value="$i"><br />
EOF;

for ($j=0;$j< count($titles);$j++){
	$k=$j+1;
	echo "$titles[$j]: <input type=\"text\" name=\"title\" value=\"$row[$k]\"><br />";
    }
echo <<<EOF
Check to delete: <input type="checkbox" name="delete_row" value="yes">  Check to delete the file as well: <input type="checkbox" name="delete_file" value="yes"><br/>
<input type="submit" value="Submit changes">

</body></html>
EOF;
?>
