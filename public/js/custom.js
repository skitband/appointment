$(document).ready(function(){

	$('.service_id').click(function(){
		var service_id = $(this).data('service-id');
        var service_name = $(this).data('service-name');
    	$('#service_id').val(service_id);
        $('#service_name').val(service_name);
    	$('#selected_service').html(service_name);

 	});

 	$('.staff_name').click(function(){
		var staff_name = $(this).data('staff-name');
    	$('#staff_name').val(staff_name);
    	$('#selected_staff1').html(staff_name);
    	$('#selected_staff2').html(staff_name);
 	});

 	$('.date_time').blur(function(){
		var date_time = $(this).val();
    	$('#date_time').val(date_time);
    	$('#selected_datetime').html(date_time);
 	});

});