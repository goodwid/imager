<?php

include ("./dbinfo.inc.php");

echo <<<EOF
<html> <head> <meta http-equiv="refresh" content="4;url=viewer.php">
<title>updating</title>
</head>
<body>
EOF;

$id=$_REQUEST["id"];
$title=$_REQUEST["title"];
$artist_first=$_REQUEST["artist_first"];
$artist_last=$_REQUEST["artist_last"];
$show_title=$_REQUEST["show_title"];
$year=$_REQUEST["year"];
$artwork_height=$_REQUEST["artwork_height"];
$artwork_width=$_REQUEST["artwork_width"];
$artwork_depth=$_REQUEST["artwork_depth"];
$filename=$_REQUEST["filename"];
$delete_row=$_REQUEST["delete_row"];
$delete_file=$_REQUEST["delete_file"];

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

if ($delete_row=="yes") {
	$query="DELETE FROM $table WHERE id='$id'";
	mysql_query($query);
        echo "Row deleted.  \n";

	if ($delete_file=="yes") {
		$query="SELECT filename FROM $table WHERE id='$id'";
		$target=mysql_query($query);
		unlink($target);
		echo "File deleted.";
	}
}
else {
	$query="UPDATE $table SET title='$title',artist_first='$artist_first',artist_last='$artist_last',show_title='$show_title',year='$year',artwork_height='$artwork_height',artwork_width='$artwork_width',artwork_depth='$artwork_depth',filename='$filename' WHERE id='$id'";

	mysql_query($query);

	echo "Info successfully updated.";
}

mysql_close();


echo " </body> </html>";


?>
