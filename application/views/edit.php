<input type="hidden" id="base_url" value="<?php echo base_url();?>"/>
<div id="fademsg">
<center><label id="msg"><b><?php if(isset($empupdate)){echo "Employee details updated.";} ?></b></label>
</center>
</div>
<?php 

foreach($employees as $employee)
{	
	foreach($fields as $field_name => $field_display) { 
		if($field_name == "emp_no"){ $emp_no = $employee->$field_name;}
		elseif($field_name == "birth_date"){ $birth_date = $employee->$field_name;}
		elseif($field_name == "first_name"){ $first_name = $employee->$field_name;}
		elseif($field_name == "last_name"){ $last_name = $employee->$field_name;}
		elseif($field_name == "gender"){ $gender = $employee->$field_name;}
		elseif($field_name == "hire_date"){ $hire_date = $employee->$field_name;}
	}	
}

foreach($sal as $sals)
{	
	foreach($salField as $field_name2 => $field_display2) { 
		if($field_name2 == "salary"){ $salary = $sals->$field_name2;}
	}	
}

foreach($title as $titles)
{	
	foreach($titleField as $field_name3 => $field_display3) { 
		if($field_name3 == "title"){ $jobtitle = $titles->$field_name3;}
	}	
}

foreach($department as $depts)
{	
	foreach($deptField as $field_name4 => $field_display4) { 
		if($field_name4 == "dept_no"){ $dept = $depts->$field_name4;}
	}	
}

 ?>
 
<table valign="middle" align="center">
<tr>
<td width="20px"></td>
<td ><button id="bas" name="bas" class="txt">Basic Details</button></td>
<td "><button id="oth" name="oth" class="txt">Other Details</button></td>

</tr>

</table>
<div id="add_form">
<form id="deleteemp" method="GET" action="<?php echo base_url()."index.php/find/updateemp"?>">

<input type="hidden" name="emp_no" value="<?php echo $emp_no;?>" />
<input type="hidden" id="oldSalary" name="oldSalary" value="<?php if(isset($salary)){echo $salary;}else{echo "";}?>" />
<input type="hidden" id="oldTitle" name="oldTitle" value="<?php if(isset($jobtitle)){echo $jobtitle;}else{echo "";}?>" />
<input type="hidden" id="oldDept" name="oldDept" value="<?php if(isset($dept)){echo $dept;}else{echo "";}?>" />
<input type="hidden" id="oldDeptmgr" name="oldDeptmgr" value="<?php if(isset($dept_mgr)){echo $dept_mgr ;}else{echo "";}?>" />
<div class="basic">
<table valign="middle" align="center">
<tr><td>Date of Birth </td> <td><input  required="required" value="<?php echo $birth_date;?>"  type="date" id="dateofbirth" name="dateofbirth"/></td></tr>
<tr>
<td>First Name </td><td><input type="text" value="<?php echo $first_name;?>"  required="required" value="" name="firstname" id="firstname"/></td>
</tr>
<tr>
<td> Last Name </td><td><input type="text" value="<?php echo $last_name;?>"  required="required"  value="" name="lastname" id="lastname"/></td>
</tr>
<tr>
<td>Gender</td>
<td>
<select name="gender" id="gender">
	<option value="M" <?=$gender == 'M' ? ' selected="selected"' : '';?>>Male</option>
	<option value="F" <?=$gender == 'F' ? ' selected="selected"' : '';?>>Female</option>
</select>
</td>
</tr>
<tr>
<td>Hire Date</td><td><input required="required" value="<?php echo $hire_date;?>" type="date" id="hiredate" name="hiredate"/></td>
</tr>

</table>

</div>



<div class="other" align="middle" align="center">
<table >
<tr>
<td>Salary </td><td><input  required="required" value="<?php echo $salary;?>" type="text" name="salary" id="salary"/></td>
</tr>

<tr>
<td>Department</td>
<td><select  name="dept" id="dept">
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
<td> Dept. Manager </td> <td> <input type="checkbox" id="deptmgr" name="deptmgr" value="deptmgr" <?=$dept_mgr == true ? ' checked="checked"' : '';?>></td>
</tr>

<tr>
<td>Title </td><td><select name="jobtitle" id="jobtitle">
  <option value="Assistant Engineer" <?=$jobtitle == 'Assistant Engineer' ? ' selected="selected"' : '';?> >Assistant Engineer</option>
  <option value="Engineer" <?=$jobtitle == 'Engineer' ? ' selected="selected"' : '';?>>Engineer</option>
  <option value="Senior Engineer" <?=$jobtitle == 'Senior Engineer' ? ' selected="selected"' : '';?>>Senior Engineer</option>
  <option value="Staff" <?=$jobtitle == 'Staff' ? ' selected="selected"' : '';?>>Staff</option>
  <option value="Technique Leader" <?=$jobtitle == 'Technique Leader' ? ' selected="selected"' : '';?>>Technique Leader</option>
</select></td>
</tr>
<tr>
<td height="20px"></td><td></td>
</tr>
<tr>
<td align="left"><input id="edit" type="submit" value="Save" /> </form> </td><td align="right"><form method="GET" action="<?php echo base_url()."index.php/find/delete"?>"> <input type="hidden" name="emp_no" value="<?php echo $emp_no;?>"/><input type="submit" id="delete" value="Delete"/></form></td>
</tr>
</table>

</div>
</div>


