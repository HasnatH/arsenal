<?php
foreach($employees as $employee)
{	
	foreach($fields as $field_name => $field_display) { 
		if($field_name == "emp_no"){ $emp_no = $employee->$field_name;}
		elseif($field_name == "first_name"){ $first_name = $employee->$field_name;}
		elseif($field_name == "last_name"){ $last_name = $employee->$field_name;}
	}	
}


?>
<div id="delete_form">
<form id="deleteemp" method="GET" action="<?php echo base_url()."index.php/find/deleteemp"?>">

<center>

<h3>Are you sure you want to delete the following employee?</h3>
		<table width="200">
		<tr>
			<td align="left"> <?php echo $emp_no ; ?> </td>
			<td align="center"> <?php echo $first_name ; ?></td>
			<td align ="right"> <?php echo $last_name ; ?></td>
		</tr>
		<tr><td colspan="3"><br/></td></tr>
		<tr>
			<td align="left"><input type="submit" value="Delete" id="delete"/> </form> </td>
			<td></td>
			<td align="right">
			<form  method="GET" action="<?php echo base_url()."index.php/find/edit"?>"> <input type="hidden" value="<?php echo $emp_no;?>" name="emp_no" /> <input id="cancel" type="submit" value="Cancel"/> </form></td> 
		</tr>
		</table> 
	


</center>


</div>