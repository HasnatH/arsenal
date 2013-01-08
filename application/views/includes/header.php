<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/w1294947/css/style.css">
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="<?php echo base_url() ?>css/jquery.js"></script>
  <script src="<?php echo base_url() ?>css/global.js"></script>
</head>
<body>

<?php 
switch ($main_content)
{
    case "search":
  	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Search";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span><b>Search</b></span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;

  case "searchform":
  	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Search";
	echo "</h1>";	
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span><b>Search</b></span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
    case "home":
  	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Home Page";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span><b>Home</b></span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
  case "login_form":
  break;

  case "add":
  	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Forbidden";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
	
						

  break;
 

 case "edit":
  	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Forbidden";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
	
						

  break;
 
 
 case "edit2":
  	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Forbidden";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
	
						

  break;
  
   case "delete":
  	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Forbidden";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
	
						

  break;
  
   case "help":
	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Help";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo "</div>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login\" method=\"post\">";
	echo "<input id=\"loginh\" type=\"submit\" value=\"LOGIN\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div id=\"cssmenu2\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span><b>Help</b></span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
  
  default:
  break;
} ?>





