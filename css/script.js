
jQuery(function($) {
alert('fa');
	$.getJSON('http://localhost/w1294947/index.php/find/findemp?firstname=as', function (json) {
		
		var select = $(#city_list);
		$.each(json, function(k, v){
			var select = $('<option />');
			option.attr('value', v)
				.html(v)
				.appendTo(select);
		});
	});
});