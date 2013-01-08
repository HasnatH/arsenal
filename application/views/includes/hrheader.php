<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>  </title>
	<link rel="stylesheet" type="text/css" href="/w1294947/css/style.css"/>
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>css/jquery.js"></script>
  <script src="<?php echo base_url() ?>css/global.js"></script>
  
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    
<script type="text/javascript">
$(document).ready(function(){

  $(".basic").show();
  $(".other").hide();

document.getElementById("bas").style.color="#FFFFFF";
document.getElementById("bas").style.fontWeight = 'bolder';
document.getElementById("oth").style.color="#000000";
document.getElementById("oth").style.fontWeight = 'lighter';

  $("#fademsg").fadeOut(4000);
  
		$("#bas").click(function()
		{			
			$(".basic").show();
			$(".other").hide();
			 document.getElementById("bas").style.color="#FFFFFF";
			 document.getElementById("bas").style.fontWeight = 'bolder';
			 document.getElementById("oth").style.color="#000000";
			 document.getElementById("oth").style.fontWeight = 'lighter';
		
		
					
		});
		
		$("#oth").click(function()
		{			
			$(".basic").hide();
			$(".other").show();
			 document.getElementById("oth").style.color="#FFFFFF";
			 document.getElementById("oth").style.fontWeight = 'bolder';
			 document.getElementById("bas").style.color="#000000";
			 document.getElementById("bas").style.fontWeight = 'lighter';
			
		});
		
 

  	
});


</script>

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
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeR\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span><b>Search</b></span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span>Add</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span>Edit</span></a></li>";
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
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeR\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span><b>Search</b></span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span>Add</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span>Edit</span></a></li>";
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
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeR\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span><b>Home</b></span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span>Add</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span>Edit</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
  
  case "add":
	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Add Employee";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeR\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span><b>Add</b></span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span>Edit</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
  case "login_form":
  break;

  case "edit":
	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Edit Employee";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeRE\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span>Add</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span><b>Edit</b></span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
  
  case "edit2":
	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Edit Employee";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeRE\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span>Add</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span><b>Edit</b></span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span>Help</span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
  case "delete":
	echo"<div id=\"headers\">";
	echo "<h1>";
	echo "Edit Employee";
	echo "</h1>";
	echo "</div>";
	echo "<hr/>";
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeRE\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span>Add</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span><b>Edit</b></span></a></li>";
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
	echo	"<div id=\"sess\">";
	echo "<form action=\"/w1294947/index.php/login/logout\" method=\"post\">";
	echo "<input id=\"logouth\" type=\"submit\" value=\"LOGOUT\"/>";
	echo "</form>";
	echo "</div>";
	echo "<div  id=\"cssmenuHomeR\">";
	echo	"<ul>";
	echo "<li class=\"active\">";
	echo "<li><a href=\"". base_url()."index.php/find/"."\"><span>Home</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/searchform"."\"><span>Search</span></a></li>";
	echo "<li><a href=\"http://www.ecwm604.us/w1294947/index.php/find/add\"><span>Add</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/edit"."\"><span>Edit</span></a></li>";
	echo "<li><a href=\"". base_url()."index.php/find/help"."\"><span><b>Help</b></span></a></li>";
	echo "</ul>
	</div> <br/>";
						

  break;
  
  default:
  break;
} ?>





