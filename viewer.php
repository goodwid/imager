<?php

echo <<<EOF
<html><head>
<script type="text/javascript" src="highslide/easing_equations.js"></script>
<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
<script type="text/javascript" src="highslide/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="highslide/highslide-ie6.css" />
<![endif]-->

<title>image viewer</title></head><body>
EOF;

include ("dbinfo.inc.php");

$query="SELECT * FROM $table";

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$result=mysql_query($query);
$num=mysql_numrows($result);

echo <<<EOF
<p>
<a href="index.html">Go back to the beginning</a>
</p>
<table border="0" cellpadding="4">
<caption>Artwork</caption>
<tr><th>Title</th><th>Name</th><th>Show</th><th>Year</th><th>Dimensions</th><th>Image</th></tr>

EOF;

$i=0;
while ($i < $num) {

    $id=mysql_result($result,$i,"id");
    $title=mysql_result($result,$i,"title");
    $artist_first=mysql_result($result,$i,"artist_first");
    $artist_last=mysql_result($result,$i,"artist_last");
    $show_title=mysql_result($result,$i,"show_title");
    $year=mysql_result($result,$i,"year");
    $artwork_height=mysql_result($result,$i,"artwork_height");
    $artwork_width=mysql_result($result,$i,"artwork_width");
    $artwork_depth=mysql_result($result,$i,"artwork_depth");
    $path=mysql_result($result,$i,"filename");
    
    if ($i%2==0) { 
	echo "<tr bgcolor=\"#ffffff\">";
	}
      else { 
	echo "<tr bgcolor=\"#bbbbbb\">";
	}

    echo <<<EOF
        <td>$title</td>
        <td>$artist_first $artist_last</td>
        <td>$show_title</td>
        <td>$year</td>
        <td>H: $artwork_height" x W: $artwork_width" x D: $artwork_depth"</td>
        <td><a href="$path" class="highslide" onclick="return hs.expand(this)" title="$title, $show_title" style="float:right">
	    <img src="$path"  alt="$title" style="width: 100px;height:100px;" /></td>
        <td><form action="edit.php" method="GET"><input type="hidden" name="id" value="$id"><input type="submit" value="Edit"></form></td>
    </tr>
EOF;

    $i++;
}

echo "</table>";
mysql_close();

echo "</body></html>";

?>
