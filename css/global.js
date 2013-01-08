$(document).ready(function() {
	
	$('#search').click(function(e) {
		e.preventDefault();
		var empty = "";
		$('.countSearch').html(empty);
		
		var msg = "<center><img src=\"http://ecwm604.us/w1294947/css/images/searching.gif\"</img></center>";
		$('.countSearch').append(msg);
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var dept = $('#dept').val();
		var jobtitle = $('#jobtitle').val();
		
		var host = document.location.host + 'w12949476/index.php/find/findemp';
		
		$.getJSON(
			'findemp', 
			{ firstname: firstname, lastname: lastname, dept: dept, jobtitle: jobtitle },
			
			
			function(data){
				$('.findemp_results').remove();
				
				
				var msg2 = "<h5>Found " + data.count +" Result(s).</h5>";
				
				 $('.countSearch').html(msg2);
				var table = "<table id=\"hovertable\" class=\"findemp_results\"><tr align=\"center\" valign=\"middle\"><th>Emp No</th><th>First Name</th><th>Last Name</th><th>Department</th><th>Title</th></tr>";
				$.each(data.results, function(i, emp){
						table += "<tr align=\"center\" valign=\"middle\">" +
								 "<td>" + emp.emp_no+ "</td>" +
								 "<td>" + emp.firstname+ "</td>" +
								 "<td>" + emp.lastname+ "</td>" +	
								 "<td>" + emp.dept + "</td>" +	
								 "<td>" + emp.jobtitle + "</td>" +	
								 "</tr>"
				
				
				});
				table += "</table>";
				
				$('.showresults').append(table);
		});

	});
	
	
	
	
	$('#searchHR').click(function(e) {
		e.preventDefault();
		var empty = "";
		$('.countSearch').html(empty);
		
		var msg = "<center><img src=\"http://ecwm604.us/w1294947/css/images/searching.gif\"</img></center>";
		$('.countSearch').append(msg);
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var dept = $('#dept').val();
		var jobtitle = $('#jobtitle').val();
		
		var host = document.location.host + 'w12949476/index.php/find/findemp';
		
		$.getJSON(
			'findemp', 
			{ firstname: firstname, lastname: lastname, dept: dept, jobtitle: jobtitle },
			
			
			function(data){
				$('.findemp_results').remove();
				
				
				var msg2 = "<h5>Found " + data.count +" Result(s).</h5>";
				
				 $('.countSearch').html(msg2);
				var table = "<table id=\"hovertableHR\" class=\"findemp_results\"><tr align=\"center\" valign=\"middle\"><th>Emp No</td><th>D.O.B</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Department</th><th>Title</th><th>Hire Date</th><th>View + Edit</th></tr>";
				$.each(data.results, function(i, emp){
					var edit = document.location.host + 'w12949476/index.php/find/edit';
						table += "<tr align=\"center\" valign=\"middle\">" +
								 "<td>" + emp.emp_no+ "</td>" +
								 "<td>" + emp.birth_date + "</td>" +
								 "<td>" + emp.firstname+ "</td>" +
								 "<td>" + emp.lastname+ "</td>" +	
								 "<td>" + emp.gender+ "</td>" +	
								 "<td>" + emp.dept + "</td>" +	
								 "<td>" + emp.jobtitle + "</td>" +	
								 "<td>" + emp.hire_date + "</td>" +	
								 "<td><form method=\"get\" action=\"edit\"><input value=\"View\" type=\"submit\"/><input type=\"hidden\" name=\"emp_no\"value=\""+emp.emp_no+"\" id=\"emp_no\" ></form></td>" +	
								 "</tr>"
				
				
				});
				table += "</table>";
				
				$('.showresults').append(table);
		});

	});
});



