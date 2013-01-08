<?php

//fill in the fields if there is data already entered before
//for user help
if(isset($_GET['firstname']))
{
$fname = $_GET['firstname'];
}
else 
{
$fname = "";
}

if(isset($_GET['lastname']))
{
$lname = $_GET['lastname'];
}
else 
{
$lname = "";
}

if(isset($_GET['dept']))
{
$dept = $_GET['dept'];
}
else
{
$dept = "";
}


if(isset($_GET['jobtitle']))
{
$jtitle = $_GET['jobtitle'];
}
else 
{
$jtitle = "";
}

?>
<!--messages displayed if set-->
<div id="fademsg">
<center><label id="msg"><b><?php if(isset($empdel)){echo "Employee deleted.";} ?></b></label>
<label id="msg"><b><?php if(isset($nosearch)){echo "Please enter at least one field to search.";} ?></b></label>
</center>
</div>

<!--search form sends using ajax get method-->
<div id="search_form">
<form id="searchquery" method="GET" action="<?php echo base_url()."index.php/find/findemp"?>">
<table valign="middle" align="center" id="tablesearch">
<tr>
<td>First Name </td><td><input type="text" value="<?php if(($fname == null) || ( $fname == "")){ echo ""; } else { echo $fname;} ?>" name="firstname" id="firstname"/></td>
</tr>
<tr>
<td> Last Name </td><td><input type="text" value="<?php echo $lname ?>" name="lastname" id="lastname"/></td>
</tr>
<tr>
<td>Department </td><td>
<select  name="dept" id="dept">
  <option value=""></option>
  <option value="d002" <?=$dept == 'd002' ? ' selected="selected"' : '';?>>Finance</option>
  <option value="d003" <?=$dept == 'd003' ? ' selected="selected"' : '';?>>Human Resources</option>
  <option value="d001" <?=$dept == 'd001' ? ' selected="selected"' : '';?>>Marketing</option>
  <option value="d004" <?=$dept == 'd004' ? ' selected="selected"' : '';?>>Production</option>
  <option value="d006" <?=$dept == 'd006' ? ' selected="selected"' : '';?>>Quality Management</option>
  <option value="d008" <?=$dept == 'd008' ? ' selected="selected"' : '';?>>Research</option>
  <option value="d007" <?=$dept == 'd007' ? ' selected="selected"' : '';?>>Sales</option>  
</select></td>
</tr>
<tr>
<td>Job Title </td><td><select name="jobtitle" id="jobtitle">
  <option value=""></option>
  <option value="Assistant Engineer" <?=$jtitle == 'Assistant Engineer' ? ' selected="selected"' : '';?> >Assistant Engineer</option>
  <option value="Engineer" <?=$jtitle == 'Engineer' ? ' selected="selected"' : '';?>>Engineer</option>
  <option value="Senior Engineer" <?=$jtitle == 'Senior Engineer' ? ' selected="selected"' : '';?>>Senior Engineer</option>
  <option value="Staff" <?=$jtitle == 'Staff' ? ' selected="selected"' : '';?>>Staff</option>
  <option value="Technique Leader" <?=$jtitle == 'Technique Leader' ? ' selected="selected"' : '';?>>Technique Leader</option>

</select></td>
</tr>
<tr>
<td></td><td align="right"><input <?=$is_logged_in == 'is_logged_in' || $is_logged_in == '1' ? ' id="searchHR"' : 'id="search"';?> type="submit" value="SEARCH" /></td>
</tr>
</tr>
</table>
</form>
</div>
<hr/>
<!--div to show the number of results and searching message-->
<div class="countSearch"></div>
<!--div to show the results-->
<div class="showresults"></div>
