<!--template page builds up the views depending on if logged in and what page to load-->
<?php 
if($is_logged_in == "1" || $is_logged_in == "is_logged_in")
	{
		$this->load->view('includes/hrheader' , $main_content); 			
	}	
	else 
	{	
		$this->load->view('includes/header' , $main_content);
	}	

	
?>

<?php 
if($main_content == "search" ||$main_content == "searchform" ) 
{
$this->load->view('includes/search_form');
}

if($main_content == "add" || $main_content == "edit" || $main_content == "edit2" || $main_content == "delete" )
{
if($is_logged_in != "1" || $is_logged_in != "is_logged_in")
	{
		$main_content = "forbidden";
	}
}
$this->load->view($main_content); 
?>


<?php $this->load-> view('includes/footer'); ?>
