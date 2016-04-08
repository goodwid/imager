<?php
$temp=$_GET["show"];

switch ($temp) {
case "The Irrational Season":
case "Digging Through The Wall":
case "As Comfortable as I Can Be":
case "Hem Me In":
case "Medical Kitsch":
case "Other Works":
	$display_show=$temp;
	break;
default:
	$display_show="All Images";
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script type="text/javascript" src="highslide/easing_equations.js"></script>
<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
<script type="text/javascript" src="highslide/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="highslide/highslide-ie6.css" />
<![endif]-->

<title>Andrea Rosselle | <? echo "$display_show\n";?></title>
<style type="text/css">
@import url(style.css);
#main {
	position:relative;
	top:5px;
	width:700px;
	height:500px;
	float: right;
}
#thumbContainer {
	top:5px;
	width:270px;
	height:430px;
	position:relative;
	float: left;
}
img.thumbs {
	float:left;
	height:50px;
	width:50px;
	margin-right: 2px;
	margin-bottom: 2px;
	border: solid black 1px;
}
img.main {
	float: right;
	}
</style>

</head>
<LINK REL="SHORTCUT ICON" HREF="favicon.ico">

<body>
<div class="container">
<ul class="nav">
  <li><a class="here" href="images.html">Images</a></li>
  <li><a href="objects.html">Objects</a></li>
  <li><a href="exhibits.html">Exhibits</a></li>
  <li><a href="http://www.craftdrip.com" target="_blank">Blog</a></li>
  <li><a href="bio.html">Bio</a></li>
  <li><a href="statements.html">Statements</a></li>
  <li><a href="resume.html">Resume</a></li>
  <li><a href="friends.html">Friends</a></li>
  <li><a href="contact.html">Contact</a></li>
</ul>
<br>
<? 

include ("dbinfo.inc.php");

if ($display_show=="All Images"){
	$query="select * from $table";
	}
else {
	$query="SELECT * FROM $table WHERE show_title='$display_show'";
}

mysql_connect($dbhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$result=mysql_query($query);
$num=mysql_numrows($result);


echo "<div class='images'>\n";

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
    $image_height=mysql_result($result,$i,"image_height");
    $image_width=mysql_result($result,$i,"image_width");
    $path=mysql_result($result,$i,"filename");

    $additional_class=(%i % 5) == 0 ? " end" : "";
    echo "<div class='imagerow" . $additional_class . "'>";
    


    echo "    <a href='$path' class='highslide' onclick='return hs.expand(this)' title='$title, $show_title' style='float:right'>\n";
    if ($image_height>$image_width) {
	$ratio=$image_width/$image_height;
	$thumb_height=100;
	$thumb_width=100*$ratio;
	}
    else {
	$ratio=$image_height/$image_width;
	$thumb_width=100;
	$thumb_height=100*$ratio;
    }
    echo "        <img src='$path'  alt='$title' style='width: $thumb_width" . "px;height:$thumb_height" . "px;' /></td>\n";
    $i++;
}

mysql_close();

?>
<p class="footer">Contact me at andrea@andrearosselle.com<br />
  All images property of Andrea Rosselle, copyright 2011</p>
</div>

</body>
</html>
