

$(document).ready(function() {
    $('select#employee').on('change', function() {
        var empID = $(this).val();
        alert(empID);
        if(empID) {
            $.ajax({
                url: '/salaries/ajax/'+ empID,
                type: "GET",
                dataType: "json",
                success:function(data) {

                    if(data==""){
                        $('#sal').empty();
                        $('#sal').append('<option value="">'+ "No Data for this Account" +'</option>');
                    }else{
                        // $('#sal').empty();
                        $('tbody#t-salary').empty();
                        $.each(data, function(value) {
                            // $('#sal').append('<option value="">'+ value +'</option>');
                            $("tbody#t-salary").append("<tr><td>" + value + "</td><td>" + value + "</td><td>" + value + "</td><td>" + value + "</td><td>" + value + "</td><td>" + value + "</td></tr>");                      
                        });                        
                    }
                },
            });
        }else{
            $('select#sal').empty();
            console.log('No data for this account');
        }
    });
});



