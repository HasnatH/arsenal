<!--show message if it is set-->
<!--message is displayed if emp_no given before was not found or incorrect-->
<center><div id="fademsg">
<label id="msg"><b>
<?php 	if(isset($found))
		{
			if ($found == 0) 
			{
				echo "  Employee Not Found. Please Enter A Valid Employee Number.";
			}
		} ?></b></label></div>
		
<!--form to enter a emp id number-->
<div id="edit_form" >
<h2>Please Enter An Employee Number to Edit.</h2>
<form id="noGetForm" method="GET" action="<?php base_url() . "index.php/find/edit"?> ">
<input name="emp_no" type="text" id="emp_no"/>
<input id="edit2" type="submit" value="Edit" />
</form>
</div>
</center>