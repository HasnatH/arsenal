<!--messages displayed if needed to be displayed-->
<div id="fademsg">
<center><label id="msg"><b><?php if(isset($empadd)){echo "Employee added.";} ?></b></label></center>
</div>

<!--tab display to show the fields to enter to add new employee-->
<table valign="middle" align="center">
<tr>
<td width="20px"></td>
<td align="left"><button id="bas" name="bas" class="txt">Basic Details</button></td>
<td align="right"><button id="oth" name="oth" class="txt">Other Details</button></td>

</tr>

</table>
<!--add form -->
<div id="add_form">
<form id="addemp" method="GET" action="http://www.ecwm604.us/w1294947/index.php/find/addemp">


<div class="basic">
<table valign="middle" align="center">
<tr><td>Date of Birth </td> <td><input  required="required" type="date" id="dateofbirth" name="dateofbirth"/></td></tr>
<tr>
<td>First Name </td><td><input type="text" required="required" value="" name="firstname" id="firstname"/></td>
</tr>
<tr>
<td> Last Name </td><td><input type="text" required="required"  value="" name="lastname" id="lastname"/></td>
</tr>
<tr>
<td>Gender</td>
<td>
<select name="gender" id="gender">
	<option value="M">Male</option>
	<option value="F">Female</option>
</select>
</td>
</tr>
<tr>
<td>Hire Date</td><td><input required="required" type="date" id="hiredate" name="hiredate"/></td>
</tr>

</table>

</div>



<div class="other" align="middle" align="center">
<table >
<tr>
<td>Salary </td><td><input  required="required" type="text" name="salary" id="salary"/></td>
</tr>

<tr>
<td>Department</td>
<td><select name="department" id="department">
  <option value="d002" >Finance</option>
  <option value="d003" >Human Resources</option>
  <option value="d001" >Marketing</option>
  <option value="d004" >Production</option>
  <option value="d006" >Quality Management</option>
  <option value="d008" >Research</option>
  <option value="d007" >Sales</option>  
</select></td>

</tr>
<tr>
<td> Dept. Manager </td> <td> <input type="checkbox" id="deptmgr" name="deptmgr" value="deptmgr"></td>
</tr>

<tr>
<td>Title </td><td><select name="title" id="title">
  <option value="Assistant Engineer" >Assistant Engineer</option>
  <option value="Engineer" >Engineer</option>
  <option value="Senior Engineer" >Senior Engineer</option>
  <option value="Staff" >Staff</option>
  <option value="Technique Leader" >Technique Leader</option>
</select></td>
</tr>
<tr>
<td></td><td align="right"><input required="required" id="add" type="submit" value="ADD" /></td>
</tr>
</table>

</div>
</div>
</form>