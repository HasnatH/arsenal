<!--*****NOT USED!!!!****-->
<!--used to display results using this page when JSON was not used captured-->
<?php $emp = array();?>
<br/>
<br/>
<h5>Found <?php echo $num_results; ?> Record(s). </h5><br/>

<table id ="hovertable" class="hovertable">
<tr align="center" valign="middle">
<?php foreach($fields as $field_name => $field_display) : ?>
<th align="center" valign="middle" <?php if($sort_by == $field_name) echo "class=\"sort_$sort_order\""?>>
	<?php echo $field_display; ?>
</th>

<?php endforeach; ?>
<?php if($is_logged_in == "is_logged_in"){echo "<th>View + Edit</th>";  } ?> 
</tr>
<?php foreach($employees as $employee): ?>

<tr align="center" valign="middle" >
<?php foreach($fields as $field_name => $field_display) : ?>

<td align="center" valign="middle" >
	<?php echo $employee->$field_name; ?>
	<?php if($field_name == "emp_no"){ $emp[] = $employee->$field_name;}?>
	
</td>	

<?php endforeach; ?>
<?php if($is_logged_in == "is_logged_in"):?>
<td>
<?php echo "<form method=\"get\" action=". base_url()."index.php/find/edit\><input name=\"emp_no\" type=\"hidden\" value=\"".end($emp)."\"/><input type=\"submit\" value=\"View\"/></form>"; ?>
</td>
<?php endif;?>
</tr>


<?php endforeach; ?>

</table>
<br/>
<br/>